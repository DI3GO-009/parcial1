class Pacientes_Model {
    constructor(
      ID_paciente,
      Nombre,
      Edad,
      Enfermedad,
      Fecha_ingreso,      
      Ruta
    ) {
      this.ID_paciente = ID_paciente;
      this.Nombre = Nombre;
      this.Edad = Edad;
      this.Enfermedad = Enfermedad;
      this.Fecha_ingreso = Fecha_ingreso;      
      this.Ruta = Ruta;
    }
    todos() {
      var html = "";
      $.get("../../Controllers/pacientes.controller.php?op=" + this.Ruta, (res) => {
        res = JSON.parse(res);
        $.each(res, (index, valor) => {
          var fondo;
          if (valor.Rol == "Administrador") fondo = "bg-primary";
          else if (valor.Rol == "Vendedor") fondo = "bg-success";
          else if (valor.Rol == "Cliente") fondo = "bg-warning";
          else if (valor.Rol == "Gerente") fondo = "bg-danger";
          else if (valor.Rol == "Cajero") fondo = "bg-info";
          html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Nombres}</td>
                  <td>${valor.Edad}</td>
                  <td>${valor.Enfermedad}</td>
                  <td>${valor.Fecha_ingreso}</td>
                  <td><div class="d-flex align-items-center gap-2">
                  <span class="badge ${fondo} rounded-3 fw-semibold">${
            valor.Rol
          }</span>
              </div></td>
              <td>
              <button class='btn btn-success' onclick='editar(${valor.ID_paciente})'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.ID_paciente})'>Eliminar</button>             
              </td></tr>
                  `;
        });
        $("#tabla_pacientes").html(html);
      });
    }
  
    insertar() {
      var dato = new FormData();
      dato = this.Rol;
      $.ajax({
        url: "../../Controllers/pacientes.controller.php?op=insertar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("pacientes", "Paciente Registrado", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        },
      });
      this.limpia_Cajas();
    }
  
    
 
  
    uno() {
      var ID_paciente = this.ID_paciente;
      $.post(
        "../../Controllers/pacientes.controller.php?op=uno",
        { ID_paciente: ID_paciente },
        (res) => {
          console.log(res);
          res = JSON.parse(res);
          $("#ID_paciente").val(res.ID_paciente);
          $("#Nombre").val(res.Nombre);
          $("#Edad").val(res.Edad);
          $("#Tratamiento").val(res.Tratamiento);
          $("#Fecha_ingreso").val(res.Fecha_ingreso);
          
         
        }
      );
      $("#Modal_pacientes").modal("show");
    }
  
    editar() {
      var dato = new FormData();
      dato = this.Rol;
      $.ajax({
        url: "../../Controllers/pacientes.controller.php?op=actualizar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("pacientes", "Paciente Actualizado", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        },
      });
      this.limpia_Cajas();
    }
  





    
    eliminar() {
        
      var ID_paciente = this.ID_paciente;
  
      Swal.fire({
        title: "Pacientes",
        text: "Esta seguro de eliminar al paciente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(
            "../../Controllers/pacientes.controller.php?op=eliminar",
            { ID_paciente: ID_paciente },
            (res) => {
              console.log(res);
              
              res = JSON.parse(res);
              if (res === "ok") {
                Swal.fire("paciente", "Paciente Eliminado", "success");
                todos_controlador();
              } else {
                Swal.fire("Error", res, "error");
              }
            }
          );
        }
      });
  
      this.limpia_Cajas();
    }
  
    limpia_Cajas() {
      document.getElementById("Nombre").value = "";
      document.getElementById("Edad").value = "";
      document.getElementById("Tratamiento").value = "";
      document.getElementById("Fecha_ingreso").value = "";
      
      $("#ID_paciente").val("");
  
      $("#Modal_paciente").modal("hide");
    }
  }
  