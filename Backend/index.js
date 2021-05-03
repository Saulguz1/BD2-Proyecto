var express = require('express');
var bodyParser = require('body-parser');
var app = express();
const cors = require('cors');
const cassandra = require('cassandra-driver');

var corsOptions = { origin: true, optionsSuccessStatus: 200 };
app.use(cors(corsOptions));
app.use(bodyParser.json({ limit: '10mb', extended: true }));
app.use(bodyParser.urlencoded({ limit: '10mb', extended: true }))
var port = 5000;
app.listen(port);
console.log('Listening on port', port);

const client = new cassandra.Client({
    contactPoints: ['localhost'],
    localDataCenter:'datacenter1',
    keyspace : 'Proyecto'
  });

client.connect(function (err,result){
    console.log('conectado a cassandra')
})

//OBTENER restaurante todos los de la tabla
app.post("/reporte1", async (req, res) => {
 
});
  
 



