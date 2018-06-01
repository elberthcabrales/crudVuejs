@extends('layouts.app')

@section('content')
<div class="row" id="crud">
		<div class="col-xs-12">
			<form class="input-group" onsubmit="return false">
				<input type="text" class="form-control"
				 v-model="param"
				 placeholder="Recipient's username" aria-describedby="basic-addon2">
				<span class="input-group-btn" id="basic-addon2" data-toggle="modal" data-target="#create">
					<button class="btn btn-primary" type="button">Nuevo+</button>
				</span>
			</form>
		</div>
		<br/>
		<div class="col-sm-12">
			<table class="table table-hover table-striped">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
					<th colspan="2">
						&nbsp;
					</th>
				</thead>
				<tbody>
					<tr v-for="user in users">
						<td width="10px">@{{ user.id }}</td>
						<td>@{{ user.name }}</td>
						<td>@{{ user.email }}</td>
						<td width="10px">
							<a href="#" class="btn btn-primary btn-sm" v-on:click.prevent="editUser(user)">Editar</a>
						</td>
						<td width="10px">
							<a class="btn btn-danger btn-sm" v-on:click.prevent="deleteUser(user)">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>

			<nav class="nav navbar-nav navbar-right">
				<ul class="pagination">
					<li v-if="pagination.current_page > 1">
						<a href="#" @click.prevent="changePage(pagination.current_page - 1)">
							<span>Atras</span>
						</a>
					</li>
					
					<li v-for="page in pageNumber" v-bind:class="[page == isActived ? 'active' : '']">
						<a href="#" @click.prevent="changePage(page)">
							@{{ page }}
						</a>
					</li>
					
					<li v-if="pagination.current_page < pagination.last_page">
						<a href="#" @click.prevent="changePage(pagination.current_page + 1)">
							<span>Siguiente</span>
						</a>
					</li>
				</ul>	
			</nav>

			@include('create')
			@include('edit')
		</div>
	</div>

@endsection
