<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Fetch</title>
    <style>
        body {
            background: color #303030;
            color: aliceblue;
        }

        table thead {
            background-color: #303030;
            color: azure;
        }
    </style>
  </head>
  <body>
    <h1>Fiscal</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- creamos un contenedor con margenes automaticos Margin Top 4 sombra y color -->
    <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Mensaje</th>
                    <th>Fecha de mensaje</th>
                    <th>IP</th>
                    <th>Navegador</th>
                </tr>
            </thead>

            <tbody id="data"></tbody>
        </table>
    </div>

    <script>
        let url = 'http://localhost:8000/api/fiscal/registros';

        // Solicitud a la URL
        fetch(url)
            .then(response => response.json()) // Resolvemos la primera promesa y traemos los datos en formato JSON
            .then(response => {
                const registros = response.data;  // Aquí accedemos correctamente al array de registros
                mostrarData(registros);  // Llamamos a la función para mostrar los datos
            })
            .catch(error => console.log(error)); // Si hay error, lo atrapamos

        const mostrarData = (data) => {
            console.log(data);
            let body = '';

            // Bucle para recorrer el array de registros
            data.forEach(item => {
                body += `
                    <tr>
                        <td>${item.contacto}</td>
                        <td>${item.correo}</td>
                        <td>${item.celular}</td>
                        <td>${item.mensaje}</td>
                        <td>${item.f_mensaje}</td>
                        <td>${item.ip}</td>
                        <td>${item.navegador}</td>
                    </tr>
                `;
            });

            document.getElementById('data').innerHTML = body;  // Insertamos el contenido en el HTML
        };
    </script>
  </body>
</html>
