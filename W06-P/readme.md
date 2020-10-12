<새로 배운 내용>

Github
> git add *
로컬 저장소에 바뀐 목록이 있을 때 목록에 등록 : add
> git commit -m "message"
실제로 목록에 등록한 내용을 로컬 저장소에 반영 : commit
> git push origin master
원격 저장소에 넣음 : push

CRUD : Create, Read, Update, Delete

Database
> mysql -uadmin -p
> show databases
> use employees;

<문제가 발생하거나 고민한 내용>

1) 직원 정보를 조회할 때 사번이나 이름을 입력해서 검색 결과를 얻기 위해 
> <form action="emp_search.php" method="POST">
        직원 정보 검색(사번 입력)
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Search">
    </form>
    <form action="emp_search.php" method="POST">
        직원 이름 검색(이름 입력)
        <input type="text" name="first_name" placeholder="first_name">
        <input type="submit" value="Search">
    </form>

코드를 추가해 emp_no나 first_name을 입력받는 form 태그를 만든다.

isset를 이용해서 입력받은 사번이나 이름이 있는지 확인한다. 위의 방법으로 사용자에게 입력받아서 데이터를 전달받은 경우 포스트 방식으로 전달받은 방식이기 때문에
> isset($_POST['emp_no'])
를 입력하며, 만약 empno를 입력받았을 경우 사번을 where문에 조건으로 주기 때문에 
> if (isset($_POST['emp_no'])) {
        $filtered_id = mysqli_real_escape_string($link, $_POST['emp_no']);
        $query = "SELECT * FROM employees WHERE emp_no='{$filtered_id}'";
    }
라고 작성하며, first_name을 입력받았을 경우 이름을 조건으로 검색하기 때문에
> else if (isset($_POST['first_name'])) {
        $filtered_first_name = mysqli_real_escape_string($link, $_POST['first_name']);
        $query = "SELECT * FROM employees WHERE first_name='{$filtered_first_name}'";
    }
따로 조건문을 통해 쿼리를 입력해준다.

2) 리다이랙션을 이용해 직원수정, 삭제를 할 경우 별도의 클릭 과정 없이 바로 직원 정보조회 페이지인 emp_select.php 페이지로 이동하게 했다.
> header('Location: emp_select.php');

3) birth_date와 hire_date를 정해진 양식으로만 입력받기 위해 type를 date로 지정한 후 max="9999-12-31" 를 추가하였다.
> <label>birth_date:</label>
        <input type="date" name="birth_date" value="<?=$row['birth_date']?>"placeholder="birth_date" max="9999-12-31"><br>

또, 라디오버튼을 통해 gender를 M과 F 둘 중 하나를 입력받는다.
> <label>gender: &nbsp; &nbsp;
        <input type="radio" name="gender" value="M" <?php if ($row['gender'] != "F") echo "checked"; ?>>M
        <input type="radio" name="gender" value="F" <?php if ($row['gender'] == "F") echo "checked"; ?>>F
        </label><br>

emp_update와 emp_delete에서는 이미 입력된 데이터 값을 라디오버튼으로 받아와야 하기 때문에
> <?php if ($row['gender'] != "F") echo "checked"; ?> 
라는 php코드를 추가하였다.

emp_delete.php에서는 데이터 수정이 이루어지지 않아야 하기 때문에 다른 form 태그에서는 readonly속성을 붙였으나 라디오버튼에서는 동작하지 않아
> onclick="return(false);"
를 추가하였다.

<참고할 만한 내용>
html 라디오버튼을 readonly로 바꾸는 방법 : https://pgmaru.tistory.com/188 

<회고>

'+ : bash shell에 따로 들어갈 필요 없이 visual studio code에서 바로 사용 가능해서 너무 편리하다. 게다가 깃허브 커밋까지 가능하다니

'- : 처음에 수업을 들었을 때는 분명 깃허브 커밋이 안돼서 1시간 반정도 헤매다가 포기하고 우선 끄고 다른날에 다시 수업을 들었는데 그 때 다시 했을때는 고친것도 없는데 갑자기 됐다. 이런식으로 껏다 키거나 시간이 조금 지나면 안됐다가 되는 경우가 있어서 무엇이 잘못됐었는지를 모르겠어서 조금 답답하다.

'! : 보안문제나 다른 여러 문제가 없는,, 좋은 웹페이지를 만들기위해 더 많은 고민을 해야겠다는 생각을 했다.

테스트동영상 : https://youtu.be/6mDh5ZIwXMI
