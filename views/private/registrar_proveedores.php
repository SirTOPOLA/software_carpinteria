<?php
 
// Obtener datos del proveedor
$stmt = $pdo->prepare("SELECT * FROM proveedores");
$stmt->execute();
$proveedor = $stmt->fetch(PDO::FETCH_ASSOC);

 

 
?>
 <div id="content" class="container container-fluid-ms  py-4">
  <div class="card border-0 shadow rounded-4 col-lg-9 mx-auto">
    <div class="card-header bg-warning text-dark rounded-top-4 py-3">
      <h5 class="mb-0 text-white">
        <i class="bi bi-truck me-2"></i>Registrar Proveedor
      </h5>
    </div>

    <div class="card-body">
      <form id="formProveedor" method="POST" class="row g-3 needs-validation" novalidate>

        <!-- Nombre -->
        <div class="col-md-6">
          <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" name="nombre" id="nombre" class="form-control" required
              >
            <div class="invalid-feedback">El nombre del proveedor es obligatorio.</div>
          </div>
        </div>

        <!-- Correo -->
        <div class="col-md-6">
          <label for="correo" class="form-label">Correo electrónico</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" name="correo" id="correo" class="form-control"
              >
          </div>
        </div>

        <!-- Contacto -->
        <div class="col-md-6">
          <label for="contacto" class="form-label">Persona de contacto</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
            <input type="text" name="contacto" id="contacto" class="form-control"
              >
          </div>
        </div>

        <!-- Teléfono -->
        <div class="col-md-6">
          <label for="telefono" class="form-label">Teléfono</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="text" name="telefono" id="telefono" class="form-control"
           >
          </div>
        </div>

        <!-- Dirección -->
        <div class="col-12">
          <label for="direccion" class="form-label">Dirección</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
            <textarea name="direccion" id="direccion" class="form-control"
              rows="2"> </textarea>
          </div>
        </div>

        <!-- Botones -->
        <div class="col-12 d-flex justify-content-between mt-3">
          <a href="index.php?vista=proveedores" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="bi bi-arrow-left-circle me-1"></i>Volver
          </a>
          <button type="submit" class="btn btn-outline-success text-outline-dark rounded-pill px-4">
            <i class="bi bi-save-fill me-1"></i>Registrar
          </button>
        </div>

      </form>
    </div>
  </div>
</div>




    
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formProveedor');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Evita envío tradicional

        const formData = new FormData(form);

        fetch('api/guardar_proveedor.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Mostrar éxito y redirigir o limpiar
                alert('Proveedor registrado correctamente');
                window.location.href = 'index.php?vista=proveedores';
            } else {
                alert(data.error || 'Ocurrió un error al procesar el formulario.');
            }
        })
        .catch(err => {
            console.error('Error en la petición:', err);
            alert('Error al enviar el formulario. Intenta de nuevo.');
        });
    });
});
</script>