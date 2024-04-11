  <nav class="navbar navbar-expand-lg bg-info-subtle">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('student.index')}}">Student</a>
              </li>
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('class.index')}}">Class</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('course.index')}}">Course</a>
            </li>
        </ul>
      </div>
      <a class="navbar-brand" href="/">Home</a>
    </div>
  </nav>
