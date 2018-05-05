var express = require('express');
var bodyParser = require('body-parser');
var app = express();
var mysql = require('mysql');
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "toor",
  database: "test"
});
var session = require('express-session');
app.use(session({
	secret: 'KingsterDelhiServer',
	resave: true,
	saveUninitialized: true
}));
var jade = require('jade');
const execSync = require('child_process').execSync;
var request = require("request"),
	cheerio = require("cheerio"),
	GsViews = [],
	totalResults = 0,
	resultsDownloaded = 0;
function callback () {
	resultsDownloaded++;
	
	if (resultsDownloaded !== totalResults) {
		return;
	}
	
	var words = [];
	for (prop in corpus) {
		words.push({
			word: prop,
			count: corpus[prop]
		});
	}
	words.sort(function (a, b) {
		return b.count - a.count;
	});
	console.log(words.slice(0, 20));
}
var fs = require('fs');
var path = require('path');
var server = require('http').createServer(app);
var io = require('socket.io')(server);
var SSHClient = require('ssh2').Client;
var vmh = "NULL",vmun = "NULL",vmpass = "NULL";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
app.use(bodyParser.urlencoded({ extended: true }));

app.get('/',function(req,res){
	res.send('Welcome to this Page');
});
app.get('/login',function(req,res){
	res.sendFile(__dirname + '/login.html');
});
app.post('/login',function(req,res){
	con.connect(function(err) {
		if (err) throw err;
		con.query("SELECT * FROM `registers` WHERE `email` ="+mysql.escape(req.body.un)+";", function (err, results,fields) {
			if (err) throw err;
			console.log(results);
			if(results)
				if(req.body.pass == results[0].password){
					console.log("User Loggedin : " + req.body.un);
					req.session.user = req.body.un;
					req.session.auth = true;
					res.send("Successful Login");
				}
				else{
					console.log("Wrong Password");
					res.send("Wrong Password");
				}
			else{
				console.log("Invalid Auth");
				res.send("Wrong EmailAddress");
			}
		});
	});
});
app.get('/logout',function(req,res){
	req.session.destroy();
	res.send('Logout Successful');
	vmh = "NULL",vmun = "NULL",vmpass = "NULL";
});
app.use(express.static(__dirname + '/public'));
app.get('/testing/api',function(req,res){
	if(req.session && req.session.auth == true){
		res.sendFile(__dirname + '/api.html');
	}
	else{
		res.redirect("http://localhost:3000/login");
	}
})
app.post('/testing/api',function(req,res){
	console.log(req.body.api);
	if(req.session && req.session.auth == true){
		con.query("SELECT * FROM "+req.body.api+" ;", function (errr, results,fields) {
			if (errr) throw errr;
			console.log(results);
			console.log(JSON.stringify(results));
			execSync("python plot.py '"+JSON.stringify(results)+"'");
			console.log('Graph Made');
			var html = jade.renderFile('Data.jade',{
    			items: results
			});
			res.send(html);
		});
	}
	else{
		res.redirect("http://localhost:3000/login");
	}
})
app.get('/testing/gsearch',function(req,res){
	if(req.session && req.session.auth == true){
		res.sendFile(__dirname + '/gsearch.html');
	}
	else{
		res.redirect("http://localhost:3000/login");
	}
})

app.post('/testing/gsearch',function(req,res){
	if(req.session && req.session.auth == true){
		var disp=[];
		url = "https://scholar.google.com/scholar?q=" + req.body.query.split(" ").join("+");
		console.log(url);
		request(url, function (error, response, body) {
			if(error){
				console.log("Couldn’t get page because of error: " + error);
				return;
			}
			var $ = cheerio.load(body),
			links = $(".gs_rt a");
			links.each(function (i, link) {
		var url = $(link).attr("href");
		var title =$(link).text();
		url = url.replace("/url?q=", "").split("&")[0];
		var result={"Rank":i,"Title":title,"Link":"http://localhost:3000/redirect/"+url};
		disp.push(result);
		console.log(i);
		console.log(title);
		console.log(url);
		if (url.charAt(0) === "/") {
			return;
		}
		totalResults++;
		});
		console.log(disp);
		var html = jade.renderFile('results.jade',{
    			items: disp
			});
			res.send(html);
	});
	
};
});
app.get(/redirect/,function(req,res){
	if(req.session && req.session.auth == true){
		var redirectUrl = req.url.replace("/redirect/","");
		console.log(redirectUrl);
		res.redirect(redirectUrl);
		GsViews.push({url: redirectUrl});
		resultsDownloaded++;
		
	}
	else{
		res.redirect("http://localhost:3000/login");
	}
});
app.get("/ssh",function(req,res){
	if(req.session && req.session.auth == true){
		res.sendFile(__dirname + '/VM.html');
	}
	else{
		res.redirect("http://localhost:3000/login");
	}
})
app.post("/ssh",function(req,res){
	if(req.session && req.session.auth == true){
	console.log("Session Confirmed");
		if(req.body.hip && req.body.un && req.body.pass){
		console.log("POST Request Processing");
			vmh = req.body.hip;
			vmun = req.body.un;
			vmpass = req.body.pass;
			execSync("vboxmanage startvm Test --type headless");
			res.sendFile(__dirname + '/ssh.html');
		}
		else{
			res.redirect("http://localhost:3000/ssh");
		}
	}
	else{
		res.redirect("http://localhost:3000/login");
	}
})
io.on('connection', function(socket) {
	console.log("SSH");
  var conn = new SSHClient();
  conn.on('ready', function() {
    socket.emit('data', '\r\n*** SSH CONNECTION ESTABLISHED ***\r\n');
    conn.shell(function(err, stream) {
      if (err)
        return socket.emit('data', '\r\n*** SSH SHELL ERROR: ' + err.message + ' ***\r\n');
      socket.on('data', function(data) {
        stream.write(data);
      });
      stream.on('data', function(d) {
        socket.emit('data', d.toString('binary'));
      }).on('close', function() {
        conn.end();
      });
    });
  }).on('close', function() {
    socket.emit('data', '\r\n*** SSH CONNECTION CLOSED ***\r\n');
    vmh = "NULL",vmun = "NULL",vmpass = "NULL";
    execSync("vboxmanage controlvm Test poweroff");
  }).on('error', function(err) {
    socket.emit('data', '\r\n*** SSH CONNECTION ERROR: ' + err.message + ' ***\r\n');
  }).connect({
    host: vmh,
    username: vmun,
    password: vmpass
  });
});
server.listen(3000);
//host: '192.168.43.212' un: 'tinu' pass: 'unit'
//Start VM : vboxmanage startvm Test --type headless
//Power off : vboxmanage controlvm Test poweroff
//SaveState : vboxmanage controlvm Test savestate
//req.session.destroy();
