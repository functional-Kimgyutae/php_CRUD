        <h3 class="m-5">글보기</h3>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                    <?= htmlentities($b->title) ?>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-primary"><?= htmlentities($b->writer) ?></span>
                                <span class="badge badge-info"><?= $b->date ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            <?= nl2br(htmlentities($b->content)) ?>
                        </p>
                    </div>
                    <div class="card-footer">
                    <a href="/board" class="btn btn-primary">목록</a>
                    <?php if( __SESSION &&$_SESSION['user']->userId == $b->userId): ?>
                        <a href="/board/mod?idx=<?= $b->idx ?>" class="btn btn-success">수정</a>
                        <a href="/board/del?idx=<?= $b->idx ?>" class="btn btn-danger">삭제</a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>