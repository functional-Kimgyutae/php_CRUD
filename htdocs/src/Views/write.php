        <h3 class="m-5">글작성 하기</h3>
        <form action="/board/write" method="post"> 
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" id="title" placeholder="제목을 입력하세요" name="title">
            </div>
            <div class="form-group">
                <label for="content">글 내용</label>
                <textarea class="form-control" id="content" rows="8" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">작성</button>
        </form>
    </div>
</body>

</html>