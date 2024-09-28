from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render, redirect
from .forms import JobApplicationForm
from .models import prices,sales

def index(request):
  template = loader.get_template('index.html')
  return HttpResponse(template.render())

def jobs(request):
    form = JobApplicationForm()
    return render(request, 'jobs.html', {'form': form})

def menu(request):
  template = loader.get_template('menu.html')
  return HttpResponse(template.render())

def music(request):
  template = loader.get_template('music.html')
  return HttpResponse(template.render())

def pricing(request):
  just_java_price = prices.objects.filter(coffee='justjava').first()
  return render(request, 'pricing.html', {'just_java_price': just_java_price})

def sales(request):
  template = loader.get_template('sales.html')
  return HttpResponse(template.render())

def show_form(request):
    if request.method == 'POST':
        form = JobApplicationForm(request.POST)
        if form.is_valid():
            # Process the form data
            name = form.cleaned_data['myName']
            email = form.cleaned_data['myEmail']
            startdate = form.cleaned_data['startdate']
            experience = form.cleaned_data['myExperience']
            # Redirect or render a success template
            return render(request, 'show_form.html', {
                'name': name,
                'email': email,
                'startdate': startdate,
                'experience': experience
            })
    else:
        form = JobApplicationForm()
    
    return render(request, 'jobs.html', {'form': form})
