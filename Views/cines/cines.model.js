/** @format */

class Cines_Model {
  constructor(UsuarioId, Cedula, Nombres, Apellidos, Telefono, Correo, Contrasenia, Rol, Ruta) {
    this.UsuarioId = UsuarioId;
    this.Cedula = Cedula;
    this.Nombres = Nombres;
    this.Apellidos = Apellidos;
    this.Telefono = Telefono;
    this.Correo = Correo;
    this.Contrasenia = Contrasenia;
    this.Rol = Rol;
    this.Ruta = Ruta;
  }
  todos(filtro) {
    var html = '';
    $.get('../../Controllers/cines.controller.php?op=' + this.Ruta, res => {
      res = JSON.parse(res);

      if (filtro) {
        res = res.filter(cine => {
          return (
            cine.Nombre.toLowerCase().includes(filtro.toLowerCase()) ||
            cine.Ciudad.toLowerCase().includes(filtro.toLowerCase()) ||
            cine.Direccion.toLowerCase().includes(filtro.toLowerCase()) ||
            cine.Teléfono.toLowerCase().includes(filtro.toLowerCase()) ||
            cine.Número_salas.toLowerCase().includes(filtro.toLowerCase())
          );
        });
      }

      $.each(res, (index, valor) => {
        const { ID_cine, Ciudad, Nombre, Número_salas, Direccion, Teléfono } = valor;

        html += `<tr>
                <td>${ID_cine}</td>
                <td>${Nombre}</td>
                <td>${Ciudad}</td>
                <td>${Número_salas}</td>
                <td>${Direccion}</td>
                <td>${Teléfono}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${ID_cine})'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${ID_cine})'>Eliminar</button>
            
            </td></tr>
                `;
      });
      $('#tabla_cines').html(html);
    });
  }

  insertar() {
    var dato = new FormData();
    dato = this.Rol;
    $.ajax({
      url: '../../Controllers/cines.controller.php?op=insertar',
      type: 'POST',
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === 'ok') {
          Swal.fire('cines', 'Cine Registrado', 'success');
          todos_controlador();
        } else {
          Swal.fire('Error', res, 'error');
        }
      },
    });
    this.limpia_Cajas();
  }

  uno(ID_cine) {
    $.post('../../Controllers/cines.controller.php?op=uno', { ID_cine: ID_cine }, res => {
      res = JSON.parse(res);
      const { ID_cine, Ciudad, Nombre, Número_salas, Direccion, Teléfono } = res;
      console.log(res);
      $('#staticBackdropLabel').text('Editar Cine');
      $('#CineId').val(ID_cine);
      $('#Ciudad').val(Ciudad);
      $('#Nombre').val(Nombre);
      $('#Número_salas').val(Número_salas);
      $('#Direccion').val(Direccion);
      $('#Teléfono').val(Teléfono);
      // $('#Contrasenia2').val(res.Contrasenia);

      // document.getElementById('Rol').value = res.Rol; //asiganr al select el valor
    });
    $('#Modal_cines').modal('show');
  }

  editar() {
    var dato = new FormData();
    dato = this.Rol;
    $.ajax({
      url: '../../Controllers/cines.controller.php?op=actualizar',
      type: 'POST',
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === 'ok') {
          Swal.fire('cines', 'Cine Editado', 'success');
          todos_controlador();
        } else {
          Swal.fire('Error', res, 'error');
        }
      },
    });
    this.limpia_Cajas();
  }

  eliminar(ID_cine) {
    Swal.fire({
      title: 'Cine',
      text: 'Esta seguro de eliminar el cine',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Eliminar',
    }).then(result => {
      if (result.isConfirmed) {
        $.post('../../Controllers/cines.controller.php?op=eliminar', { ID_cine: ID_cine }, res => {
          console.log(res);

          res = JSON.parse(res);
          if (res === 'ok') {
            Swal.fire('cines', 'Cine Eliminado', 'success');
            todos_controlador();
          } else {
            Swal.fire('Error', res, 'error');
          }
        });
      }
    });

    this.limpia_Cajas();
  }

  limpia_Cajas() {
    document.getElementById('CineId').value = '';
    document.getElementById('Nombre').value = '';
    document.getElementById('Ciudad').value = '';
    document.getElementById('Número_salas').value = '';
    document.getElementById('Direccion').value = '';
    document.getElementById('Teléfono').value = '';

    $('#Modal_cines').modal('hide');
  }
  getCiudades() {
    $.get('../../Controllers/cines.controller.php?op=ciudades', res => {
      res = JSON.parse(res);
      let html;

      $.each(res, (index, valor) => {
        const { nombre_ciudad } = valor;

        html += ` <option value="${nombre_ciudad}">${capitalizarPrimerasLetras(nombre_ciudad)}</option>`;
      });
      $('#Ciudad').html(html);
    });
  }
  crearCiudad(nombre_ciudad) {
    $.post('../../Controllers/cines.controller.php?op=crearCiudades', { nombre_ciudad: nombre_ciudad.toLowerCase() }, res => {
      this.getCiudades();
    });
  }
}


function capitalizarPrimerasLetras(cadena) {
  // Dividir la cadena en palabras
  const palabras = cadena.split(' ');

  // Capitalizar la primera letra de cada palabra
  const palabrasCapitalizadas = palabras.map(palabra => {
    return palabra.charAt(0).toUpperCase() + palabra.slice(1);
  });

  // Unir las palabras capitalizadas de nuevo en una cadena
  const resultado = palabrasCapitalizadas.join(' ');

  return resultado;
}
