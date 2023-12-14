//archivo de donde llamar al procedimiento
//controlador

function init() {
  $('#form_cines').on('submit', function (e) {
    guardaryeditar(e);
  });
  $("#btnFiltrar").on("click", function () {
    const filtro = $('#filtro').val();
    todos_controlador(filtro);
  })
  $('#btn_cancel').on("click", () => {
      var cines = new Cines_Model('', '', '', '', '', '', '', '', 'todos');
      cines.limpia_Cajas();
            $('#staticBackdropLabel').text('Nuevo Cine');
  });
  $('#mostrarInput').on("click", function () {
    $('#inputContainer').css('display', 'flex');
  });
  $('#cerrarBtn').on("click", function () {
    $('#nuevaCiudad').val('');
    $('#inputContainer').css('display', 'none');
  })
  $('#guardarBtn').on('click', function () {
    const nuevaCiudad = $('#nuevaCiudad').val();
    var cines = new Cines_Model('', '', '', '', '', '', '', '', 'todos');
    cines.crearCiudad(nuevaCiudad);
    $('#inputContainer').css('display', 'none');
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
  getCiudades()
});

var todos_controlador = (filter) => {
  var cines = new Cines_Model('', '', '', '', '', '', '', '', 'todos');
  cines.todos(filter);
};
const getCiudades = () => {
var cines = new Cines_Model('', '', '', '', '', '', '', '', 'todos');
cines.getCiudades();
}

var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($('#form_cines')[0]);
 
  var CineId = document.getElementById("CineId").value
  if(CineId > 0){
    var cines = new Cines_Model("","","","","","","",formData,"editar");
    cines.editar();
  }else{
    var cines = new Cines_Model('', '', '', '', '', '', '', formData, 'insertar');
    cines.insertar();  
  }
};

const editar = (ID_cine) => {
  const uno = new Cines_Model(ID_cine, '', '', '', '', '', '', '', 'uno');
  uno.uno(ID_cine);
};

var eliminar = ID_cine => {
  const eliminar = new Cines_Model(ID_cine, '', '', '', '', '', '', '', 'eliminar');
  eliminar.eliminar(ID_cine);
};

https://jwt.io/#debugger-io?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
init();
