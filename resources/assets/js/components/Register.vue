<template>
	<div class="container">
		<div class="alert alert-danger" v-if="error &&  !success">
			<p>There was an error, unable to complete registration</p>
		</div>

		<div class="alert alert-success" v-if="success">
			<p>Registration completed. You can now sign in.</p>
		</div>

		<form autocomplete="off" v:onsubmit="register" v-if="!success">

			<div class="form-group" v-bind:class="{ 'has-error': error && response.name}">
				<label for="name">Name</label>
				<input type="text" id="name" class="form-control" v-model="name" required>
				<span class="help-block" v-if="error && response.name">
					{{ response.name }}
				</span>
			</div>

			<div class="form-group" v-bind:class="{ 'has-error': error && response.email}">
				<label for="email">Email</label>
				<input type="email" id="email" class="form-control" v-model="email" required>
				<span class="help-block" v-if="error && response.email">
					{{ response.email }}
				</span>
			</div>

			<div class="form-group" v-bind:class="{ 'has-error': error && response.password}">
				<label for="password">password</label>
				<input type="password" id="password" class="form-control" v-model="password" required>
				<span class="help-block" v-if="error && response.password">
					{{ response.password }}
				</span>
			</div>

			<button type="submit" class="btn btn-primary">Register</button>
			
		</form>
	</div>
</template>