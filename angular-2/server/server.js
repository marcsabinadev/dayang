//Declare Const
const express = require('express')
const bodyParser = require('body-parser')
const app = express()
const mysql = require('mysql')
const cors = require('cors')
const path = require('path')

// We declare the parameters of connection

/* Before start the server you should run the following commands on your command line interaface 
    - sudo mysql -u root -p
    - ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456789'
*/

let connection = mysql.createConnection(
    {
        host: 'localhost',
        database: 'dayang',
        user: 'm07',
        password: 'm07',

    }
)

app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())
app.use(cors())
app.use('/', express.static(path.join(__dirname, 'public')))

connection.connect(function (err) {
    if (err) throw err
});


app.get('/get-users', (req, res) => {
  connection.query("SELECT * FROM users", (error, results, field) => {
    if (error) {
        res.status(400).send({ response: null })
    } else {
      res.status(200).send(results)
    }
  })
});

app.get('/get-tournaments', (req, res) => {
  connection.query("SELECT * FROM tournaments", (error, results, field) => {
    if (error) {
        res.status(400).send({ response: null })
    } else {
      res.status(200).send(results)
    }
  })
});

app.get('/get-user_tournaments', (req, res) => {
  connection.query("SELECT * FROM user_tournaments", (error, results, field) => {
    if (error) {
        res.status(400).send({ response: null })
    } else {
      res.status(200).send(results)
    }
  })
});

app.post('/registration', function (req, res) {
  connection.query("SELECT id FROM users WHERE username = '" + req.body.name + "'", (error, results, field) => {
    if (error) {
        res.status(400).send({ response: null })
    } else {
      let user_id = results
      connection.query(`INSERT INTO user_tournaments (user_id, tournament_id) VALUES (${user_id[0].id}, ${req.body.tournament_id})`, (error, results, field) => {
        if (error) {
          res.status(400).send({ response: error })
        } else {
          res.status(200).send({ response: "Registro completado" })
        }
      })
    }
})
})

app.listen(3000, () => {
    console.log("Aquesta és la nostra API-REST que corre en http://localhost:3000'")
})