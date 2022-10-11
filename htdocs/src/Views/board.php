        <h3 class="m-5">게시글 보기</h3>
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>글번호</th>
                        <th>글제목</th>
                        <th>글쓴이</th>
                        <th>작성일</th>
                    </tr>
                    <?php foreach ($boards as $b) : ?>
                    <tr>
                        <td><?= $b->idx ?></td>
                        <td><a href="/board/view?idx=<?= $b->idx ?>"><?= htmlentities($b->title) ?></a></td>
                        <td><?= htmlentities($b->writer) ?></td>
                        <td><?= $b->date ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <?php if(__SESSION): ?>
        <div class="row">
        	<div class="col-12 text-right">
                <a href="/board/write" class="btn btn-info">글작성</a>
        	</div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if($pg->prev): ?>
                        <li class="page-item">
                            <a class="page-link" href="/board?p=<?= $pg->start-1 ?>" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						        <span class="sr-only">Previous</span>
      						</a>
                        </li>
                        <?php endif; ?>
                        <?php for($i = $pg->start; $i<= $pg->end ; $i++): ?>
                        <li class="page-item"><a class="page-link <?= $i == $p ? "active" : "" ?> " href="/board?p=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <?php if($pg->next): ?>
                        <li class="page-item">
                            <a class="page-link" href="/board?p=<?= $pg->end+1 ?>" aria-label="Next">
					        	<span aria-hidden="true">&raquo;</span>
					        	<span class="sr-only">Next</span>
					      	</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>