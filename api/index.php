<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API example</title>
</head>

<body>
  <h1>Página de inicio</h1>
  <button id="btn-employees">Cargar empleados</button>
  <ul id="ul-employees"></ul>
  <script>
    const buttonEmployees = document.getElementById('btn-employees')
    const ulEmployees = document.getElementById('ul-employees')

    function addEmployee(employee) {
      const li = document.createElement('li')
      li.textContent = employee.id + ' - ' + employee.name
      ulEmployees.append(li)
    }

    buttonEmployees.addEventListener('click', () => {
      ulEmployees.innerHTML = '<li>Cargando...</li>'
      let employees = fetch('employee.php')
        .then(response => {
          if (response.ok) {
            return response.json()
          }
        })
        .then(employees => {
          console.log('¡Acaba la promesa!')
          ulEmployees.innerHTML = ''
          employees.forEach(emp => addEmployee(emp))
        })
        .catch(error => {
          ulEmployees.innerHTML = '<li>Error de conexión</li>'
        })
    })
  </script>
</body>

</html>