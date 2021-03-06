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
    contactPoints: ['127.0.0.1'],
    localDataCenter:'datacenter1'
  });

client.connect(function (err,result){
    console.log('conectado a cassandra')
})


app.post("/gettransaccionbycuenta", async (req, res) => {
    client.execute('SELECT * FROM Proyecto.Transaccion_by_CuentaHabiente;').then(result=>res.json(result.rows));
});
  
app.post("/posttransaccionbycuenta", async (req, res) => {
    let body = req.body;
    let cui = body.cui;
    const query = 'SELECT * FROM Proyecto.Transaccion_by_CuentaHabiente WHERE cui = ?';
    client.execute(query, [cui], { prepare: true }).then(result=>res.json(result.rows));
});
 
app.post("/getDebito_by_Institucion", async (req, res) => {
    client.execute('SELECT institucion,abreviatura,SUM(montotransf) as montotransf,fechatransf FROM Proyecto.Debito_by_Institucion Group by institucion;').then(result=>res.json(result.rows));
});
  
app.post("/postDebito_by_Institucion", async (req, res) => {
    let body = req.body;
    let institucion = body.institucion;
    const query = 'SELECT institucion,abreviatura,SUM(montotransf) as montotransf ,fechatransf FROM Proyecto.Debito_by_Institucion WHERE institucion =  ? Group by institucion;';
    client.execute(query, [institucion], { prepare: true }).then(result=>res.json(result.rows));
});

app.post("/getCredito_by_Institucion", async (req, res) => {
    client.execute('SELECT institucion,abreviatura,SUM(montotransf) as montotransf,fechatransf FROM Proyecto.Credito_by_Institucion Group by institucion;').then(result=>res.json(result.rows));
});
  
app.post("/postCredito_by_Institucion", async (req, res) => {
    let body = req.body;
    let institucion = body.institucion;
    const query = 'SELECT institucion,abreviatura,SUM(montotransf) as montotransf,fechatransf FROM Proyecto.Credito_by_Institucion WHERE institucion = ? Group by institucion;';
    client.execute(query, [institucion], { prepare: true }).then(result=>res.json(result.rows));
});

app.post("/getCuentaHabiente", async (req, res) => {
    client.execute('SELECT * FROM Proyecto.CuentaHabiente;').then(result=>res.json(result.rows));
});
  
app.post("/getInstitucion", async (req, res) => {
    client.execute('SELECT * FROM Proyecto.Institucion;').then(result=>res.json(result.rows));
});
  
app.post("/getMovimientos_by_Cuentahabiente_by_mes", async (req, res) => {
    client.execute('SELECT * FROM Proyecto.Movimientos_by_Cuentahabiente_by_mes;').then(result=>res.json(result.rows));
});

app.post("/postMovimientos_by_Cuentahabiente_by_mes", async (req, res) => {
    let body = req.body;
    let cui = body.cui;
    let fechai = body.fechai;
    let fechaf = body.fechaf;
    const query = 'SELECT * FROM Proyecto.Movimientos_by_Cuentahabiente_by_mes WHERE cui = ? AND fechatransf >= ? AND fechatransf < ?;';
    client.execute(query, [cui,fechai,fechaf], { prepare: true }).then(result=>res.json(result.rows));;
});

app.post("/insertnuevo", async (req, res) => {
    let body = req.body;
    let nombre1 = body.nombre1;
    let apellido1 = body.apellido1;
    let cui1 = body.cui1;
    let email1 = body.email1;
    let fechareg1 = body.fechareg1;
    let genero1 = body.genero1;
    let institucion1 = body.institucion1;
    let abreviacion1 = body.abreviacion1;
    let tipocuenta1 = body.tipocuenta1;
    let saldoi1 = body.saldoi1;
    let nombre2 = body.nombre2;
    let apellido2 = body.apellido2;
    let cui2 = body.cui2;
    let email2 = body.email2;
    let fechareg2 = body.fechareg2;
    let genero2 = body.genero2;
    let institucion2 = body.institucion2;
    let abreviacion2 = body.abreviacion2;
    let tipocuenta2 = body.tipocuenta2;
    let saldoi2 = body.saldoi2;
    let montotrasf = body.montotrasf;
    let fechatransf = getDateTime();
    let saldomenos = body.saldomenos;
    let saldomas= body.saldomas;
    console.log(saldomenos,cui1,institucion1,fechareg1);
    console.log(saldomas,cui2,institucion2,fechareg2);
    let sal = saldoi1 - montotrasf;
    console.log(sal)
    const queries = [
        {
          query: 'INSERT INTO Proyecto.Transaccion_by_CuentaHabiente (nombre, apellido, cui, email, fechareg, genero, institucion, abreviatura,tipocuenta, saldoinicial, montotransf,fechatransf) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)',
          params: [ nombre1, apellido1,cui1,email1,fechareg1,genero1,institucion1,abreviacion1,tipocuenta1,saldoi1,montotrasf,fechatransf ]
        },
        {
            query: 'INSERT INTO Proyecto.Debito_by_Institucion (institucion, abreviatura, montotransf,fechatransf) VALUES (?, ?, ?, ?)',
            params: [institucion1,abreviacion1,montotrasf,fechatransf]
        },
        {
            query: 'INSERT INTO Proyecto.Credito_by_Institucion (institucion, abreviatura, montotransf,fechatransf) VALUES (?, ?, ?, ?)',
            params: [institucion2,abreviacion2,montotrasf,fechatransf]
        },
        {
            query: 'INSERT INTO Proyecto.CuentaHabiente (nombre,apellido,cui,email,fechareg,genero,institucion,abreviatura,tipocuenta,saldoinicial) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?,?)',
            params: [nombre1,apellido1,cui1,email1,fechareg1,genero1,institucion1,abreviacion1,tipocuenta1,saldoi1]
        },
        {
            query: 'INSERT INTO Proyecto.CuentaHabiente (nombre,apellido,cui,email,fechareg,genero,institucion,abreviatura,tipocuenta,saldoinicial) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?,?)',
            params: [nombre2,apellido2,cui2,email2,fechareg2,genero2,institucion2,abreviacion2,tipocuenta2,saldoi2]
        },
        {
            query: 'INSERT INTO Proyecto.Institucion (institucion,abreviatura) VALUES (?, ?)',
            params: [institucion1,abreviacion1]
        },
        {
            query: 'INSERT INTO Proyecto.Movimientos_by_Cuentahabiente_by_mes (nombre, apellido, cui, email, fechareg, genero, institucion, abreviatura,tipocuenta, montotransf,fechatransf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            params: [nombre1,apellido1,cui1,email1,fechareg1,genero1,institucion1,abreviacion1,tipocuenta1,montotrasf,fechatransf]
        },
        {
            query: 'UPDATE Proyecto.CuentaHabiente SET saldoinicial = ? WHERE cui = ? AND institucion = ? AND fechareg = ?',
            params: [saldomas,cui2,institucion2,fechareg2]
        }
        
      ];
      
      client.batch(queries, { prepare: true })
      .then(function() {
        
	const query = 'UPDATE Proyecto.CuentaHabiente SET saldoinicial = ? WHERE cui = ? AND institucion = ? AND fechareg = ?';
	    client.execute(query, [saldomenos,cui1,institucion1,fechareg1], { prepare: true });
	res.json({mensaje : 1});
      })
      .catch(function(err) {
console.log(err);
        res.json({mensaje : 0});
      });


      
});

function getDateTime() {

    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    month = (month < 10 ? "0" : "") + month;
    var day  = date.getDate();
    day = (day < 10 ? "0" : "") + day;
    return year + "-" + month + "-" + day ;
}
