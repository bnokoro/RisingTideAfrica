@component('mail::message')
### Hi {{$mentor->first_name}},

A mentee has been assigned to you. Mentorship details are as follows:

Mentee Fullname: {{$mentee->first_name . ' ' . $mentee->last_name}} <br />
Category Chosen: {{$mentee->category->name}} <br />
Mentorship Date: {{\Carbon\Carbon::createFromFormat('Y-m-d', $mentee->day_choosen)->format('d-m-Y')}} <br />
Mentorship Time: {{$time_choosen}}

Thanks,<br>
Rising Tide Africa
@endcomponent
