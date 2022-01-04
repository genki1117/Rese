<form action="/imgupload" method='post' enctype="multipart/form-data">
    @csrf
    <input type="file" name="imgfile">
    <button>送信</button>
</form>