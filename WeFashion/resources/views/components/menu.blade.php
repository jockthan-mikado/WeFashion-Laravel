<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
  <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Accueil
        </p>
      </a>
    </li>
{{--//nous utiliserons le can comme gardien d'acces de vue
        //pour verifier si le role est conforme a l'utilisateur au niveau de la vue menu--}}
  

  @can("admin")
  <li class="nav-item ">
       <a href="#" class="nav-link ">
        <i class=" nav-icon fas fa-user-shield"></i>
        <p>
          Gestion Produit
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item ">
         
         <a
          href=""
          class="nav-link "
          >
            <i class=" nav-icon fas fa-users-cog"></i>
            <p>Types Produit</p>
          </a>
        </li>
        
      </ul>
  </li>

  @endcan


  </ul>
</nav>
