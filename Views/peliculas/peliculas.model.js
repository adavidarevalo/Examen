/** @format */

class Peliculas_Model {
  data;
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
    $.get('../../Controllers/peliculas.controller.php?op=' + this.Ruta, res => {
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
        const { Título, ID, ID_pelicula, Género, Duración } = valor;

        // <button class='btn btn-danger' onclick='eliminarAsociacion(${ID})'>Eliminar Asociacion</button>
        html += `<tr>
                <td>${ID_pelicula}</td>
                <td>${Título}</td>
                <td>${Género}</td>
                <td>${Duración}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${ID_pelicula})'>Editar</button>
            <button class='btn btn-success' onclick='ver(${ID_pelicula})'>Ver</button>
            <button class='btn btn-danger' onclick='eliminar(${ID_pelicula})'>Eliminar Pelicula</button>
            
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
      url: '../../Controllers/peliculas.controller.php?op=insertar',
      type: 'POST',
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === 'ok') {
          Swal.fire('peliculas', 'Pelicula Registrado', 'success');
          todos_controlador();
        } else {
          Swal.fire('Error', res, 'error');
        }
      },
    });
    this.limpia_Cajas();
  }

  uno(ID_pelicula) {
    this.getGenero();
    $.post('../../Controllers/peliculas.controller.php?op=uno', { ID_pelicula }, res => {
      res = JSON.parse(res);
      const { Título, Género, Duración } = res[0];
      $('#cine-tab').css('display', 'none');
      $('#Cine_field').css('display', 'none');
      $('#ID').val(ID_pelicula);
      $('#Título').val(Título);
      $('#Género').val(Género);
      $('#Duración').val(Duración);
    });
    $('#Modal_peliculas').modal('show');
  }

  editar() {
    var dato = new FormData();
    dato = this.Rol;
    $.ajax({
      url: '../../Controllers/peliculas.controller.php?op=actualizar',
      type: 'POST',
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === 'ok') {
          Swal.fire('peliculas', 'Pelicula Editado', 'success');
          todos_controlador();
        } else {
          Swal.fire('Error', res, 'error');
        }
      },
    });
    this.limpia_Cajas();
  }

  eliminar(ID_pelicula) {
    Swal.fire({
      title: 'Cine',
      text: 'Esta seguro de eliminar la Pelicula',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Eliminar',
    }).then(result => {
      if (result.isConfirmed) {
        $.post('../../Controllers/peliculas.controller.php?op=eliminar', { ID_pelicula }, res => {
          res = JSON.parse(res);
          if (res === 'ok') {
            Swal.fire('pelicula', 'Pelicula Eliminado', 'success');
            todos_controlador();
          } else {
            Swal.fire('Error', res, 'error');
          }
        });
      }
    });
    // this.limpia_Cajas();
  }

  elminarAsociacion(ID, ID_pelicula) {
    $.post('../../Controllers/peliculas.controller.php?op=eliminarAsociacion', { ID }, res => {
      this.ver(ID_pelicula);
    });
  }

  limpia_Cajas() {
    document.getElementById('CineId').value = '';
    document.getElementById('Nombre').value = '';
    document.getElementById('Ciudad').value = '';
    document.getElementById('Número_salas').value = '';
    document.getElementById('Direccion').value = '';
    document.getElementById('Teléfono').value = '';

    $('#Modal_peliculas').modal('hide');
  }

  ver(ID_pelicula) {
    $.post('../../Controllers/peliculas.controller.php?op=uno', { ID_pelicula }, res => {
      res = JSON.parse(res);
      $('#NombrePelicula').text(res[0].Título);
      $('#GeneroPelicula').text(res[0].Género);
      $('#DuracionPelicula').val(res[0].Duración);
      $('#ID_pelicula_val').val(res[0].ID_pelicula);
      let html = '';

      $.each(res, (index, valor) => {
        html += `<tr>
                <td>${valor.Nombre_Cine}</td>
                <td>${valor.Ciudad}</td>
                <td>
                <button type="button" class="btn btn-outline-secondary" onClick="eliminarAsociacion(${valor.ID}, ${valor.ID_pelicula})">
                        X
                    </button>
                </td>
                </tr>
                `;
      });
      $('#Modal_ver_pelicula').modal('show');
      $('#table_ver_pelicula').html(html);
    });
  }
  getGenero() {
    $.post('../../Controllers/peliculas.controller.php?op=generos', {}, res => {
      res = JSON.parse(res);
      let html = '';
      $.each(res, (index, valor) => {
        html += `<option value="${valor.nombre_genero}">${valor.nombre_genero}</option>`;
      });
      $('#Género').html(html);
      $('#Genero_filter').html(html);
    });
    // $('#Modal_peliculas').modal('show');
  }

  getCiudades() {
    $.post('../../Controllers/peliculas.controller.php?op=ciudades', {}, res => {
      res = JSON.parse(res);
      let html = '';
      $.each(res, (index, valor) => {
        html += `<option value="${valor.nombre_ciudad}">${valor.nombre_ciudad}</option>`;
      });
      $('#Ciudad_filter').html(html);
    });
    // $('#Modal_peliculas').modal('show');
  }

  getCines() {
    $.post('../../Controllers/peliculas.controller.php?op=cines', {}, res => {
      res = JSON.parse(res);
      let html = '';
      $.each(res, (index, valor) => {
        html += `<option value="${valor.ID_cine}">${valor.Nombre} - ${valor.Ciudad}</option>`;
      });

      $('[id="ID_cine"]').html(html);
      $('#ID_cine_add').html(html);
      $('#Cine_filter').html(html);
    });
    // $('#Modal_peliculas').modal('show');
  }
  getPeliculas() {
    $.get('../../Controllers/peliculas.controller.php?op=todos', res => {
      res = JSON.parse(res);
      let html = '';
      $.each(res, (index, valor) => {
        html += `<option value="${valor.ID_pelicula}">${valor.Título} - ${valor.Género}</option>`;
      });

      $('#ID_pelicula').html(html);
    });
  }

  associarPeli(dato) {
    $.post('../../Controllers/peliculas.controller.php?op=asociar', dato, res => {
      this.ver(dato.ID_pelicula);
    });
  }
  async nuevoGenero(nombre_genero) {
    $.post(
      '../../Controllers/peliculas.controller.php?op=nuevoGenero',
      { nombre_genero: nombre_genero.toLowerCase() },
      res => {
        this.getGenero();
      }
    );
  }
}
