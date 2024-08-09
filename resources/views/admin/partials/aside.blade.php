

<aside class="">
    <div class="d-flex pt-5">
        <div>
            <nav>
                <ul>
                    <li>
                        <a href="{{route('adimn.home')}}" class="my-a">
                            <i class="fa-solid fa-house-chimney"></i>
                             Home
                        </a>
                    </li>
                </ul>

                <ul>
                    <li>
                        {{-- <a href="{{route('admin.projects.index')}}" class="my-a"> --}}
                            <i class="fa-solid fa-plane"></i>
                            I Miei Viaggi
                        </a>
                    </li>
                </ul>

                <ul>
                    <li>
                        {{-- <a href="{{ route('admin.technologies.index') }}" class="my-a"> --}}
                            <i class="fa-solid fa-flag"></i>
                          Le Tappe
                        </a>
                      </li>
                </ul>

                <ul>
                    <li>
                        {{-- <a href="{{ route('admin.type_project') }}" class="my-a"> --}}
                            {{-- <i class="fa-solid fa-list"></i>
                          Elenco Progetti/Tipi
                        </a> --}}
                      </li>
                </ul>

                {{-- <ul>
                    <li>
                        <a href="{{route('admin.technology-projects', $technology)}}"  class="my-a">
                            <i class="fa-solid fa-list"></i>
                          Elenco Progetti/Tecnonogie
                        </a>
                      </li>
                </ul> --}}
            </nav>
        </div>

    </div>
</aside>
