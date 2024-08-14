<x-mail::message>
# Dear Applicant,

A warm welcome to {{ get_option('school_name') }}! We are thrilled to have you join our community. Thank you for taking the first step by signing up on our portal. We are excited to guide you through the application process and explore the possibilities that our school has to offer.

As you begin this journey, please know that our dedicated team is here to support you every step of the way. Reach out to our team if you have any questions or need assistance.

To get started, here are a few required actions:

- Verify your email address
- Update your profile information
- Check your portal regularly for updates on your application status.

Once again, thank you for choosing {{ get_option('school_name') }}. We look forward to getting to know you better and helping you achieve your academic goals.

To explore the portal, click this link:
<x-mail::button :url="route('dashboard')">
    Dashboard
</x-mail::button>

If you need assistance or have questions, our support team is here to help: {{ get_option('email') }} or {{ get_option('phone') }}.

Best regards,<br>
The Admissions Office <br>
{{ get_option('school_name') }}
</x-mail::message>
