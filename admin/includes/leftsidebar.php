<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navegación</li>

                <?php if ($_SESSION['utype'] == '1'): ?>
                <li class="has_sub">
                    <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span> </a>

                </li>


                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                            <span> Usuarios </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="add-subadmins.php">Usuarios</a></li>
                            <li><a href="manage-subadmins.php">Administrar Usuarios</a></li>
                        </ul>
                    </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Categoria </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-category.php">Agregar categoria</a></li>
                        <li><a href="manage-categories.php">Administrar categorias</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span>Sub Categoria </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-subcategory.php">Agregar Sub Categoria</a></li>
                        <li><a href="manage-subcategories.php">Administrar Sub Categoria</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Noticias </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-post.php">Agregar noticia</a></li>
                        <li><a href="manage-posts.php">Administrar noticias</a></li>
                        <li><a href="trash-posts.php">Noticias borradas</a></li>
                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Comentarios </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="unapprove-comment.php">Comentarios no aprobados </a></li>
                        <li><a href="manage-comments.php">Comentarios aprobados</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Agregar comentario </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-comment.php">Agregar comentario </a></li>
                        <li><a href="manage-comments.php">Mis comentarios</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>

    </div>

</div>