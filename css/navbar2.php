<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><img class="brandLogo" src="css/33.jpg" alt="My image"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="/">Home</a>
        </li>

        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="/videos">Videos</a>
        </li>

        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="/blog">Blog</a>
        </li>

        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="/contact">Contact Me</a>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0 mr-3" method="get" action="/search/">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>

      </form>
      
      <div>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#loginModal">Login</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>
      </div>
      
    </div>

  </nav>