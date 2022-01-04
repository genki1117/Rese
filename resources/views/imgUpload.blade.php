<form action="/imgupload" method='post' enctype="multipart/form-data">
    @csrf
    <input type="file" name="shopimg">
    <button>送信</button>
</form>