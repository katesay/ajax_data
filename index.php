<html>

<head>
    <title>Live Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />
        <div class="table-responsive">
            <h3 align="center"> PHP와 MySQL에서 Ajax jQuery를 이용한 실시간 테이블 추가 편지 삭제 </h3><br />
            <!-- 이곳에 ajax에서 받아온 데이터를 뿌릴 것이다 -->
            <div id="run_result"></div>
            <div id="live_data"></div>
        </div>

    </div>
</body>

</html>


<script>
    $(document).ready(function() {

        //데이터를 ajax에서 가져와서 뿌려준다.
        function fetch_data() {
            $.ajax({
                url: "select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    //$('#live_data').text(data);
                    $('#run_result').html("데이터 가져오기 완료!");
                }
            })
        }

        //리스트 조회 함수 호출
        fetch_data();

        //추가버튼 클릭했을 때
        $(document).on('click', '#btn_add', function() {

            var first_name = $('#first_name').text();
            var last_name = $('#last_name').text();

            if (first_name == '') {
                alert("성을 입력해 주세요");
                return false;
            }
            if (last_name == '') {
                alert("이름을 입력해 주세요");
                return false;
            }

            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    first_name: first_name,
                    last_name: last_name
                },
                dataType: "text",
                success: function(data) {
                    $('#run_result').html(data);
                    //alert(data);
                    fetch_data();
                }

            })

        });


        //수정하기 함수
        function edit_data(id, text, column_name) {
            $.ajax({
                url: "edit.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name
                },
                dataType: "text",
                success: function(data) {
                    $('#run_result').html(data);
                    //alert(data);
                }
            });
        }


        //성 칼럼에서 text 필드에 입려후 마우스를 바깥에 클릭했을때
        $(document).on('blur', '.first_name', function() {
            var id = $(this).data("id1");
            var first_name = $(this).text();
            edit_data(id, first_name, "first_name");
        });

        //이름 칼럼에서 text 필드에 입려후 마우스를 바깥에 클릭했을때
        $(document).on('blur', '.last_name', function() {
            var id = $(this).data("id2");
            var last_name = $(this).text();
            edit_data(id, last_name, "last_name");
        });


        $(document).on('click', '.btn_delete', function() {

            var id = $(this).data("id3");

            if (confirm("삭제하시겠습니까?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#run_result').html(data);
                        //alert(data);
                        fetch_data();
                    }
                });
            }

        });


    });
</script>