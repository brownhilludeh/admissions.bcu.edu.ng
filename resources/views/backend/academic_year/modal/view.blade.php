<table class="table table-bordered table-striped">
    <tr>
        <td>{{ __('Session') }}</td>
        <td>{{ $academicYear->session }}</td>
    </tr>
    <tr>
        <td>{{ __('Year') }}</td>
        <td>{{ $academicYear->year }}</td>
    </tr>
    <tr>
        <td>{{ __('Start Date') }}</td>
        <td>{{ $academicYear->starting_date }}</td>
    </tr>
    <tr>
        <td>{{ __('End Date') }}</td>
        <td>{{ $academicYear->ending_date }}</td>
    </tr>
</table>
