<template>
	<div class="main-sidebar">
		<aside id="sidebar-wrapper">
			<div class="sidebar-brand">
				<router-link to="/">{{app_name}}</router-link>
			</div>
			<div class="sidebar-brand sidebar-brand-sm">
				<router-link to="/">
					JDIH
				</router-link>
			</div>
			<ul class="sidebar-menu">
				<li class="menu-header">{{user.role}}</li>
				<li class="nav-item">
					<router-link to="/home" class="nav-link">
						<i class="fas fa-home"></i>
						<span>Dashboard</span>
					</router-link>
				</li>

				<li class="nav-item"  v-if="user.role == 'super-admin'">
					<router-link to="/category" class="nav-link">
						<i class="fas fa-list-alt"></i>
						<span>Kategori</span>
					</router-link>
				</li>

				<li class="nav-item"  v-if="user.role == 'super-admin' || user.role == 'admin'">
					<router-link to="/arsip" class="nav-link">
						<i class="fas fa-archive"></i>
						<span>Arsip Produk Hukum</span>
					</router-link>
				</li>

				<li class="nav-item"  v-if="user.role == 'super-admin' || user.role == 'admin'">
					<router-link to="/news-category" class="nav-link">
						<i class="fas fa-list-ul"></i>
						<span>Kategori Berita</span>
					</router-link>
				</li>

				<li class="nav-item"  v-if="user.role == 'super-admin' || user.role == 'admin'">
					<router-link to="/berita" class="nav-link">
						<i class="fas fa-newspaper"></i>
						<span>Berita</span>
					</router-link>
				</li>

				<li class="nav-item"  v-if="user.role == 'super-admin' || user.role == 'admin'">
					<router-link to="/halaman" class="nav-link">
						<i class="fas fa-route"></i>
						<span>Halaman</span>
					</router-link>
				</li>

				<li class="nav-item"  v-if="user.role == 'super-admin' || user.role == 'admin'">
					<router-link to="/menu" class="nav-link">
						<i class="fas fa-map-signs"></i>
						<span>Menu</span>
					</router-link>
				</li>

				<li class="menu-header">Lainnya</li>

				<li class="nav-item" v-if="user.role == 'super-admin'">
					<router-link to="/user" class="nav-link">
						<i class="fas fa-users"></i>
						<span>Manajemen User</span>
					</router-link>
				</li>
				<li class="nav-item" v-if="user.role == 'super-admin'">
					<router-link to="/setting" class="nav-link">
						<i class="fas fa-user"></i>
						<span>Setting</span>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/profile" class="nav-link">
						<i class="fas fa-image"></i>
						<span>Profile</span>
					</router-link>
				</li>
			</ul>

			<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
				<a
					href="#"
					class="btn btn-primary btn-lg btn-block btn-icon-split"
					v-on:click.prevent="logout()"
				>
					<i class="fa fa-sign-out"></i>Logout
				</a>
			</div>
		</aside>
	</div>
</template>

<script>
	export default {
		computed: {
			app_name() {
				return this.$store.state.app_name;
			},
			user() {
				return this.$store.state.auth.user;
			}
		},
		methods: {
			logout: function() {
				this.$parent.$refs.auth_dropdown.logout();
			}
		}
	};
</script>

