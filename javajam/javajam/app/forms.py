from django import forms

class JobApplicationForm(forms.Form):
    myName = forms.CharField(
        label='*Name',
        max_length=100,
        widget=forms.TextInput(attrs={
            'placeholder': 'Enter your name here',
            'pattern': '[A-Za-z\s]+',
            'required': True
        })
    )
    myEmail = forms.EmailField(
        label='*E-mail',
        widget=forms.EmailInput(attrs={
            'placeholder': 'Enter your Email-ID here',
            'pattern': '^[A-Za-z0-9.-]+@[A-Za-z].[A-za-z]{2,3}',
            'required': True
        })
    )
    startdate = forms.DateField(
        label='Start Date',
        widget=forms.DateInput(attrs={
            'type': 'date',
            'placeholder': 'dd/mm/yyyy'
        }),
        required=False
    )
    myExperience = forms.CharField(
        label='*Experience',
        widget=forms.Textarea(attrs={
            'placeholder': 'Enter your experience here',
            'required': True,
            'rows': 4,
            'cols': 40
        })
    )