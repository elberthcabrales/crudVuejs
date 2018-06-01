<form method="POST" v-on:submit.prevent="updateUser(fillUser.id)">
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">
						<span>&times;</span>
					</button>
					<h4>Editar tarea</h4>
				</div>
				<div class="modal-body">
					<label for="user">Editar</label>
					<input type="text" name="name" class="form-control" v-model="fillUser.name">
					<input type="text" name="email" class="form-control" v-model="fillUser.email">
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>
