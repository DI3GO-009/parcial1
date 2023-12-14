class Tratamiento_Model {
    constructor(
      ID_tratamiento,
      ID_paciente,
      Tipo_tratamiento,
      Costo,
      Fecha_inicio,      
      Ruta
    ) {
      this.ID_tratamiento = ID_tratamiento;
      this.ID_paciente = ID_paciente;
      this.Tipo_tratamiento = Tipo_tratamiento;
      this.Costo = Costo;
      this.Fecha_inicio = Fecha_inicio;     
      this.Ruta = Ruta;
    }
    todos() {
      var html = "";
      $.get("../../Controllers/tratamientos.controller.php?op=" + this.Ruta, (res) => {
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
                  <td>${valor.Nombre_paciente}</td>
                  <td>${valor.Tipo_tratamiento}</td>
                  <td>${valor.Costo}</td>
                  <td>${valor.Fecha_inicio}</td>
                  <td><div class="d-flex align-items-center gap-2">
                  <span class="badge ${fondo} rounded-3 fw-semibold">${
            valor.Rol
          }</span>
              </div></td>
              <td>
              <button class='btn btn-success' onclick='editar(${valor.ID_tratamiento})'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.ID_tratamiento})'>Eliminar</button>
              
              </td></tr>
                  `;
        });
        $("#tabla_tratamiento").html(html);
      });
    }
  
    insertar() {
      var dato = new FormData();
      dato = this.Rol;
      $.ajax({
        url: "../../Controllers/trtamientos.controller.php?op=insertar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Tratamientos", "Tratamiento Registrado", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        },
      });
      this.limpia_Cajas();
    }
  
    
 
  
    uno() {
      var ID_tratamiento = this.ID_tratamiento;
      $.post(
        "../../Controllers/tratamientos.controller.php?op=uno",
        { ID_tratamiento: ID_tratamiento },
        (res) => {
          console.log(res);
          res = JSON.parse(res);
          $("#ID_tratamiento").val(res.ID_tratamiento);
          $("#ID_paciente").val(res.ID_paciente);
          $("#Tipo_tratamiento").val(res.Tipo_tratamiento);
          $("#Costo").val(res.Costo);
          $("#Fecha_inicio").val(res.Fecha_ingreso);
          
         
        }
      );
      $("#Modal_tratamiento").modal("show");
    }
  
    editar() {
      var dato = new FormData();
      dato = this.Rol;
      $.ajax({
        url: "../../Controllers/tratamientos.controller.php?op=actualizar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Tratamientos", "Tratamiento Actualizado", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        },
      });
      this.limpia_Cajas();
    }
  
    eliminar() {
      var ID_tratamiento = this.ID_tratamiento; 
      console.log(ID_tratamiento);

      Swal.fire({
        title: "Tratamientos",
        text: "Esta seguro de eliminar el tratamiento",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(
            "../../Controllers/tratamientos.controller.php?op=eliminar",
            { ID_tratamiento: ID_tratamiento },
            (res) => {
              console.log(res);  
                          
              res = JSON.parse(res);
              if (res === "ok") {
                Swal.fire("Tratamientos", "Tratamiento Eliminado", "success");
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
     // document.getElementById("ID_paciente").value = "";
      document.getElementById("Tipo_tratamiento").value = "";
      document.getElementById("Costo").value = "";
      document.getElementById("Fecha_inicio").value = "";
      
      $("#ID_tratamiento").val("");
  
      $("#Modal_tratamiento").modal("hide");
    }
  }
  