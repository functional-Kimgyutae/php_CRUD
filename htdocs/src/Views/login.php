        <h3 class="m-5">로그인</h3>
        <div class="row">
            <div class="col-10 offset-1">
                <form action="/user/login" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">아이디</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" placeholder="아이디" name = "userId">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">비밀번호</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="비밀번호" name="pass">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" style="float: right;">로그인</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>