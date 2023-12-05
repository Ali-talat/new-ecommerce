
  <form action="{{route('search')}}"  method="GET" id="form-search-top">
    @csrf
    <input type="text" name="search"  value="" placeholder="Search here...">
    <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
 