//archivo de donde llamar al procedimiento
//controlador

function init() {
  $('#form_pelicula').on('submit', function (e) {
    guardaryeditar(e);
  });
  $("#btnFiltrar").on("click", function () {
    const filtro = $('#filtro').val();
    todos_controlador(filtro);
  })
  $('#btn_cancel').on("click", () => {
      var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
      cines.limpia_Cajas();
            $('#staticBackdropLabel').text('Nuevo Cine');
  });
  $('#btn_nuevo').on("click", () => {
    nuevo()
  });
  $('#cine-tab').on('click', asociar_pelicula);

  $('#associar_pelicula').on('submit', asociarPeli);
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
});

var todos_controlador = (filter) => {
  var cines = new Peliculas_Model('', '', '', '', '', '', '', '', 'todos');
  cines.todos(filter);
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($('#form_pelicula')[0]);
 
  var ID = document.getElementById("ID").value
  if(ID > 0){
    var cines = new Peliculas_Model('', '', '', '', '', '', '', formData, 'editar');
    cines.editar();
  }else{
    var peliculas = new Peliculas_Model('', '', '', '', '', '', '', formData, 'insertar');
    peliculas.insertar();  
  }
};

const asociarPeli = (e) => {
    var formData = new FormData($('#associar_pelicula')[0]);
var peliculas = new Peliculas_Model('', '', '', '', '', '', '', formData, 'insertar');
peliculas.associarPeli();  

}

const editar = (ID_cine) => {
  const uno = new Peliculas_Model(ID_cine, '', '', '', '', '', '', '', 'uno');
  uno.uno(ID_cine);
};

var eliminar = ID_pelicula => {
  const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
  peliculas.eliminar(ID_pelicula);
};

  const ver = (ID_pelicula) => {
      const peliculas = new Peliculas_Model("", '', '', '', '', '', '', '', 'eliminar');
    peliculas.ver(ID_pelicula);
  }

const nuevo = () => {
        const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
        peliculas.getGenero();
        peliculas.getCines()
}

const asociar_pelicula = () => {
      const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
      peliculas.getCines();
      peliculas.getPeliculas();
}

const eliminarAsociacion = (ID) => {
        const peliculas = new Peliculas_Model('', '', '', '', '', '', '', '', 'eliminar');
peliculas.elminarAsociacion(ID)
}
https://jwt.io/#debugger-io?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
init();
