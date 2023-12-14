/** @format */

//archivo de donde llamar al procedimiento
//controlador

function init() {
  $('#form_pelicula').on('submit', function (e) {
    guardaryeditar(e);
  });
  $('#btnFiltrar').on('click', function () {
    const filtro = $('#filtro').val();
    todos_controlador(filtro);
  });
  $('#btn_cancel').on('click', () => {
    var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
    cines.limpia_Cajas();
    $('#staticBackdropLabel').text('Nuevo Cine');
  });
  $('#btn_nuevo').on('click', () => {
    nuevo();
  });
  $('#cine-tab').on('click', asociar_pelicula);

  $('#associar_pelicula').on('submit', asociarPeli);

  $('#btn_nuevo').on('click', () => {
    $('#cine-tab').css('display', 'block');
    $('#Cine_field').css('display', 'block');
  });
  $('#mostrarInput').on('click', () => {
    $('#inputContainer').css('display', 'flex');
  });
  $('#cerrarBtn').on('click', function () {
    $('#nuevaCiudad').val('');
    $('#inputContainer').css('display', 'none');
  });
  $('#guardarBtn').on('click', function () {
    const nuevoGenero = $('#nuevaCiudad').val();
    var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
    cines.nuevoGenero(nuevoGenero);
    $('#inputContainer').css('display', 'none');
    $('#nuevaCiudad').val('');
  });
  $('#agregar_nuevo_cine').on('click', function () {
    $('#nuevoCineContainer').css('display', 'flex');
    var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
    cines.getCines();
  });
  $('#cerrarBtnAgregarCine').on('click', function () {
    //  $('#nuevaCiudad').val('');
    $('#nuevoCineContainer').css('display', 'none');
  });
  $('#guardarBtnAgregarCine').on('click', async () => {
    const ID_cine = $('#ID_cine_add').val();
    const ID_pelicula = $('#ID_pelicula_val').val();
    var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
    const from = new FormData();
    from.append('ID_cine', ID_cine);
    from.append('ID_pelicula', ID_pelicula);

    await cines.associarPeli({ ID_cine, ID_pelicula });

    $('#nuevoCineContainer').css('display', 'none');
  });
  $('#btnFiltrarPeliculas').on('click', function () {
    console.log('Filtrando');
  });
  $('#Genero_filter_checkbox').on('click', function () {
    var selectGenero = $('#Genero_filter');

    if ($(this).prop('checked')) {
      selectGenero.prop('disabled', false);
    } else {
      selectGenero.prop('disabled', true);
    }
  });
  $('#Cine_filter_checkbox').on('change', function () {
    var selectCine = $('#Cine_filter');

    if ($(this).prop('checked')) {
      selectCine.prop('disabled', false);
    } else {
      selectCine.prop('disabled', true);
    }
  });

  $('#Ciudad_filter_checkbox').on('change', function () {
    var selectCiudad = $('#Ciudad_filter');

    if ($(this).prop('checked')) {
      selectCiudad.prop('disabled', false);
    } else {
      selectCiudad.prop('disabled', true);
    }
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.getGenero();
  peliculas.getCines();
  peliculas.getCiudades();
});

var todos_controlador = filter => {
  var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
  cines.todos(filter);
};

var guardaryeditar = e => {
  e.preventDefault();
  var formData = new FormData($('#form_pelicula')[0]);

  var ID = document.getElementById('ID').value;
  if (ID > 0) {
    var cines = new Peliculas_Model('', '', '', '', '', '', '', formData, 'editar');
    cines.editar();
  } else {
    var peliculas = new Peliculas_Model('', '', '', '', '', '', '', formData, 'insertar');
    peliculas.insertar();
  }
};

const asociarPeli = e => {
  var formData = new FormData($('#associar_pelicula')[0]);
  var peliculas = new Peliculas_Model('', '', '', '', '', '', '', formData, 'insertar');
  peliculas.associarPeli();
};

const editar = ID_cine => {
  const uno = new Peliculas_Model(ID_cine, '', '', '', '', '', '', '', 'uno');
  uno.uno(ID_cine);
};

var eliminar = ID_pelicula => {
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.eliminar(ID_pelicula);
};

const ver = ID_pelicula => {
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.ver(ID_pelicula);
};

const nuevo = () => {
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.getGenero();
  peliculas.getCines();
};

const asociar_pelicula = () => {
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.getCines();
  peliculas.getPeliculas();
};

const eliminarAsociacion = (ID, ID_pelicula) => {
  console.log('🚀 ~ file: peliculas.controller.js:126 ~ eliminarAsociacion ~ ID:', ID);
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.elminarAsociacion(ID, ID_pelicula);
};
//jwt.io/#debugger-io?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
https: init();
