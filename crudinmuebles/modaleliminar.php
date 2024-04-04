<!-- Modal para confirmar la eliminación de un inmueble -->
<div class="modal fade" id="confirmDeleteModal<?= $reg['IdInmueble'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <!-- Centra el modal verticalmente y lo muestra en el centro de la pantalla -->
    <div class="modal-dialog modal-dialog-centered d-flex align-items-center">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <!-- Botón de cierre del modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del modal con el mensaje de confirmación -->
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este registro?
            </div>
            <!-- Pie del modal con botones de cancelar y eliminar -->
            <div class="modal-footer">
                <!-- Botón para cancelar la eliminación y cerrar el modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Formulario para enviar la solicitud de eliminación -->
                <form method="post" action="delete.php">
                    <!-- Campo oculto con el ID del inmueble a eliminar -->
                    <input type="hidden" name="id_inmueble" value="<?= $reg['IdInmueble'] ?>">
                    <!-- Botón para confirmar la eliminación -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- el modal se utiliza para confirmar la eliminación de un registro de inmueble. Cuando se activa, el modal muestra un mensaje de confirmación y ofrece botones para cancelar la operación o confirmar la eliminación. Esto ayuda a prevenir eliminaciones accidentales al solicitar una confirmación explícita por parte del usuario antes de llevar a cabo la acción de eliminación. -->