        <div class="row mt-4">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">커뮤니티 사이트</h1>
                    <p class="lead">커뮤니티 사이트에 오신 것을 환영합니다. 이 사이트는 6월 기능반 신입생들의 평가전을 위해 만들어졌습니다. 개발을 즐기시기 바랍니다.</p>
                    <hr class="my-4">
                    <p>다양한 게시판 기능들은 아래의 게시판 버튼을 통해서 접근할 수 있습니다.</p>
                    <a class="btn btn-primary btn-lg" href="/board" role="button">게시판 보기</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
        <h3 class="mb-2">최근 게시글 보기</h3>
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>글번호</th>
                        <th>글제목</th>
                        <th>글쓴이</th>
                        <th>작성일</th>
                    </tr>
                    <?php foreach ($boards as $b):?>
                    <tr>
                        <td><?= $b->idx ?></td>
                        <td><a href="/board/view?idx=<?= $b->idx ?>"><?= htmlentities($b->title) ?></a></td>
                        <td><?= htmlentities($b->writer) ?></td>
                        <td><?= $b->date ?></td>
                    </tr>
                    <?php  endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>