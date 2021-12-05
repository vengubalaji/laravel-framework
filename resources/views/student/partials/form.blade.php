<style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: #f4f7f8;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 15px;
    margin: 0;
    outline: 0;
    padding: 10px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: #1abc9c;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #109177;
    cursor:pointer;
}

.form-style-5 .error-alert{
    color: white;
    background: red;
    text-align: center;
    padding: 2px 0px;
    margin-bottom: 10px;
}
</style>

<fieldset>
    <legend><span class="number">1</span> Student Info</legend>
    <input type="text" name="roll_no" placeholder="Roll No *" value="{{ old('roll_no', optional($student ?? null)->roll_no) }}">
    @error('roll_no')
        <div class="error-alert">{{ $message }}</div>
    @enderror
    <input type="text" name="name" placeholder="Your Name *" value="{{ old('name', optional($student ?? null)->name) }}">
    @error('name')
        <div class="error-alert">{{ $message }}</div>
     @enderror
    <input type="email" name="email" placeholder="Your Email *" value="{{ old('email',  optional($student ?? null)->email) }}">
    @error('email')
        <div class="error-alert">{{ $message }}</div>
     @enderror
    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="">Select</option>
        @if (isset($student->gender) && $student->gender == "M")
            <option value="M" selected>Male</option>
        @else
            <option value="M">Male</option>
        @endif
        @if (isset($student->gender) && $student->gender == "F")
            <option value="F" selected>Female</option>
        @else
            <option value="F">Female</option>
        @endif
    </select>
    @error('gender')
        <div class="error-alert">{{ $message }}</div>
     @enderror      
</fieldset>
<fieldset>
    <legend><span class="number">2</span> Additional Info</legend>
    <label for="year">Year:</label>
    <select id="year" name="year">
        <option value="">Select</option>
        @if (isset($student->year) && $student->year == "First")
            <option value="First" selected>First year</option>
        @else
            <option value="First">First year</option>
        @endif
        @if (isset($student->year) && $student->year == "Second")
            <option value="Second" selected>Second year</option>
        @else
            <option value="Second">Second year</option>
        @endif
        @if (isset($student->year) && $student->year == "Third")
            <option value="Third" selected>Third year</option>
        @else
            <option value="Third">Third year</option>
        @endif
        @if (isset($student->year) && $student->year == "Final")
            <option value="Final" selected>Final year</option>
        @else
            <option value="Final">Final year</option>
        @endif
    </select>
    @error('year')
        <div class="error-alert">{{ $message }}</div>
     @enderror
    <label for="department_id">Department:</label>
    <select id="department_id" name="department_id">
        <option value="">Select</option>
        @if (isset($student->department_id) && $student->department_id == "101")
            <option value="101" selected>CSE</option>
        @else
            <option value="101">CSE</option>
        @endif
        @if (isset($student->department_id) &&  $student->department_id == "102")
            <option value="102" selected>ECE</option>
        @else
            <option value="102">ECE</option>
        @endif
        @if (isset($student->department_id) &&  $student->department_id == "103")
            <option value="103" selected>EEE</option>
        @else
            <option value="103">EEE</option>
        @endif
        @if (isset($student->department_id) &&  $student->department_id == "104")
            <option value="104" selected>MECH</option>
        @else
            <option value="104">MECH</option>
        @endif
    </select>
    @error('department_id')
        <div class="error-alert">{{ $message }}</div>
     @enderror
    <textarea name="address" placeholder="Address">{{ old('address', optional($student ?? null)->address); }}</textarea>
</fieldset>
{{--  @if ($errors->any())
    <div>
        <ul>
            @foreach ( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  --}}