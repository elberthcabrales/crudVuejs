<form method="POST" v-on:submit.prevent="createUser">
	<div class="modal fade" id="create">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">
						<span>&times;</span>
					</button>
					<h4>Nueva tarea</h4>
				</div>
				<div class="modal-body">
					<label for="user">Crear tarea</label>
					<input type="text" name="user.name" class="form-control" v-model="newUser.name">
					<input type="text" name="user.email" class="form-control" v-model="newUser.email">
					<input type="password" name="user.password" class="form-control" v-model="newUser.password">
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>
			</div>
		</div>
	</div>
</form>
