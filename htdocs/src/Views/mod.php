<h3 class="m-5">글수정 하기</h3>
        <form action="/board/mod" method="post"> 
            <input type="hidden" name="idx" value="<?= $b->idx ?>">
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" id="title" placeholder="제목을 입력하세요" name="title" value="<?= $b->title ?>">
            </div>
            <div class="form-group">
                <label for="content">글 내용</label>
                <textarea class="form-control" id="content" rows="8" name="content"><?= $b->content ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">수정</button>
        </form>
    </div>
</body>

</html>