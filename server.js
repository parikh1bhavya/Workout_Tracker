var path = require('path');
var fs = require('fs');
var express = require('express');
var exphbs = require('express-handlebars');
var bodyParser = require('body-parser');

var peopleData = require('./peopleData');
var app = express();
var port = process.env.PORT || 3000;

app.engine('handlebars', exphbs({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');

app.use(bodyParser.json());

app.get('/people', function (req, res, next) {

  var templateArgs = {
    people: peopleData,
    title: "Workout Tracker"
  };

  res.render('peoplePage', templateArgs);

});

app.get('/people/:person', function (req, res, next) {
  console.log("== url params for request:", req.params);
  var person = req.params.person;
  var personData = peopleData[person];
  if (personData) {
    var templateArgs = {
      photos: personData.photos,
      name: personData.name,
      title: "Workout Tracker - " + personData.name
    }
    res.render('photosPage', templateArgs);
  } else {
    next();
  }
});

app.post('/people/:person/addExercise', function (req, res, next) {
  var person = peopleData[req.params.person];

  if (person) {
    if (req.body) {

      var photo = {
        exercise: req.body.exercise,
        weight: req.body.weight
      };

      person.photos = person.photos || [];

      person.photos.push(photo);
      fs.writeFile('peopleData.json', JSON.stringify(peopleData), function (err) {
        if (err) {
          res.status(500).send("Unable to save photo to \"database\".");
        } else {
          res.status(200).send();
        }
      });

    } else {
      res.status(400).send("Person photo must have a URL.");
    }

  } else {
    next();
  }
});

app.use(express.static(path.join(__dirname, 'public')));

app.get('*', function (req, res) {
  res.status(404).sendFile(path.join(__dirname, 'public', '404.html'));
});

// Start the server listening on the specified port.
app.listen(port, function () {
  console.log("== Server is running on port number", port);
});
