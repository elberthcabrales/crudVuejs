
new Vue({
	el: '#crud',
	created: function()
	{
		this.getUsers();
	},
	data: 
	{
		param:'',
		users: [],
		pagination: {
			'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
		},
		newUser: {},
		fillUser: {'id': '', 'neme': '','email':''},
		errors: [],
		offset: 2,
	},
	computed: {
		isActived: function() {

			return this.pagination.current_page;
		},
		pageNumber: function() {
			if (!this.pagination.to) 
			{
				return [];
			}

			var from = this.pagination.current_page - this.offset;

			if (from < 1) 
			{
				from = 1;
			}

			var to = from + (this.offset * 2);

			if (to >= this.pagination.current_page) 
			{
				to = this.pagination.current_page;
			}

			var pagesArray = [];

			while(from <= to)
			{
				pagesArray.push(from);
				from++;
			}

			return pagesArray;
		}
	},
	watch: {
		param:function(val){
			if(val){
				var urlUsers = 'users?name=' + '%'+val+'%';
				axios.get(urlUsers).then(response => {
					this.users = response.data.users.data,
					this.pagination = response.data.pagination
				});
			}else{
				this.getUsers(1);
			}
			
		},
	},
	methods: 
	{
		
		getUsers: function(page) 
		{
			var urlUsers = 'users?page=' + page;
			axios.get(urlUsers).then(response => {
				this.users = response.data.users.data,
				this.pagination = response.data.pagination
			});
		},
		editUser: function(user)
		{
			this.fillUser.id   = user.id;
			this.fillUser.name = user.name;
			this.fillUser.email = user.email;
		
			$('#edit').modal('show');
		},
		updateUser: function(id)
		{
			var url = 'users/' + id;
		
			axios.put(url, this.fillUser).then(response => {
				this.getUsers();
				this.fillUser = {'id': '', 'email': '','name':''};
				this.errors = [];
				$('#edit').modal('hide');
				toastr.success('Usuario actualizado correctamente');
			}).catch(error => {
				this.errors = error.response.data;
			});
		},
		deleteUser: function(user)
		{
			var url = 'users/' + user.id;
			
			axios.delete(url).then(response => {
				this.getUsers();
				// Notificación
				toastr.success('Eliminado correctamente');
			});
		},
		createUser: function()
		{
			var url = 'users';

			axios.post(url, {
				name: this.newUser.name,
				email: this.newUser.email,
				password: this.newUser.password
			}).then(response => {

				this.getUsers();
				this.newUser ={};
				this.errors = [];

				$('#create').modal('hide');

				toastr.success('Nuevo usuario creado correctamente');
				
			}).catch(error => {
				this.errors = error.response.data;
			});
		},
		changePage: function(page) {

			this.pagination.current_page = page;
			this.getUsers(page);
		}
	}
});