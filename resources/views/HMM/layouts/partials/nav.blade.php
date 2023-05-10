<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="height: 45px;">
    <div class="container-fluid">
        <a href="{{ route('hmm-group.home') }}" class="fs-4 me-3 nav-icon">
            <i class="fas fa-th text-white"></i>
            @if (request()->segment(2) != 'home')
                <i class="fas fa-angle-left fs-2 text-white"></i>
            @endif
        </a>
        <a class="navbar-brand" href="#">SMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                @if (request()->segment(2) == 'hmm')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'academic' ? 'active' : '' }}"
                            href="{{ route('hmm.academic.index') }}">Academic</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'program' ? 'active' : '' }}"
                            href="{{ route('hmm.program.index') }}">Program</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'course' ? 'active' : '' }}"
                            href="#">Course</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'lectuerer' ? 'active' : '' }}"
                            href="#">Lectuerer</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'timetable' ? 'active' : '' }}"
                            href="#">Timetable</span></a>
                    </li>
                @elseif (request()->segment(2) == 'payment')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'description' ? 'active' : '' }}"
                            href="{{ route('payment.description.index') }}">Description</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'payment' ? 'active' : '' }}"
                            href="{{ route('payment.payment.index') }}">Payment</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
