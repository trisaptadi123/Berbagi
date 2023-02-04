<html>
<body>
    <form action="{{url('/testing')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">submit</button>
    </form>
</body>
</html>