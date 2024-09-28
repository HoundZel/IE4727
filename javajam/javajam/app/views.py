from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render, redirect
from .forms import JobApplicationForm
from .models import prices,sales
from django.db.models import Sum
from decimal import Decimal

def index(request):
  template = loader.get_template('index.html')
  return HttpResponse(template.render())

def jobs(request):
    form = JobApplicationForm()
    return render(request, 'jobs.html', {'form': form})

def menu(request):
  just_java_price = prices.objects.filter(coffee='justjava').first()
  cafeaulait_single_price = prices.objects.filter(coffee='cafeaulait_single').first()
  cafeaulait_double_price = prices.objects.filter(coffee='cafeaulait_double').first()
  icedcappuccino_single_price = prices.objects.filter(coffee='icedcappuccino_single').first()
  icedcappuccino_double_price = prices.objects.filter(coffee='icedcappuccino_double').first()

  context = {
    'just_java_price': just_java_price,
    'cafeaulait_single_price': cafeaulait_single_price,
    'cafeaulait_double_price': cafeaulait_double_price,
    'icedcappuccino_single_price': icedcappuccino_single_price,
    'icedcappuccino_double_price': icedcappuccino_double_price
  }
  return render(request, 'menu.html', context)

def order(request):
  if request.method == 'POST':
    java_coffee_type = request.POST.get('java')
    cafe_coffee_type = request.POST.get('cafe')
    capuccino_coffee_type = request.POST.get('capuccino')

    java_quantity = int(request.POST.get('quantity_java') or 0)
    cafe_quantity = int(request.POST.get('quantity_cafe') or 0)
    capuccino_quantity = int(request.POST.get('quantity_capuccino') or 0)
    
    # Get the price of the selected coffee
    java_coffee_price = Decimal(prices.objects.get(coffee=java_coffee_type).price) if java_coffee_type else 0.0
    cafe_coffee_price = Decimal(prices.objects.get(coffee=cafe_coffee_type).price) if cafe_coffee_type else 0.0
    capuccino_coffee_price = Decimal(prices.objects.get(coffee=capuccino_coffee_type).price) if capuccino_coffee_type else 0.0
    
    # Calculate the revenue
    java_revenue = java_coffee_price * java_quantity
    cafe_revenue = cafe_coffee_price * cafe_quantity
    capuccino_revenue = capuccino_coffee_price * capuccino_quantity
    
    # Update the sales model
    try:
        sale = sales.objects.get(coffee=java_coffee_type)
        sale.quantity += java_quantity
        sale.revenue += java_revenue
        sale.save()
    except sales.DoesNotExist:
        # Handle the case where the sales record does not exist
        pass
    
    try:
        sale = sales.objects.get(coffee=cafe_coffee_type)
        sale.quantity += cafe_quantity
        sale.revenue += cafe_revenue
        sale.save()
    except sales.DoesNotExist:
        # Handle the case where the sales record does not exist
        pass
    
    try:
        sale = sales.objects.get(coffee=capuccino_coffee_type)
        sale.quantity += capuccino_quantity
        sale.revenue += capuccino_revenue
        sale.save()
    except sales.DoesNotExist:
        # Handle the case where the sales record does not exist
        pass
    
  return redirect('menu')

def music(request):
  template = loader.get_template('music.html')
  return HttpResponse(template.render())

def pricing(request):
  just_java_price = prices.objects.filter(coffee='justjava').first()
  cafeaulait_single_price = prices.objects.filter(coffee='cafeaulait_single').first()
  cafeaulait_double_price = prices.objects.filter(coffee='cafeaulait_double').first()
  icedcappuccino_single_price = prices.objects.filter(coffee='icedcappuccino_single').first()
  icedcappuccino_double_price = prices.objects.filter(coffee='icedcappuccino_double').first()

  context = {
    'just_java_price': just_java_price,
    'cafeaulait_single_price': cafeaulait_single_price,
    'cafeaulait_double_price': cafeaulait_double_price,
    'icedcappuccino_single_price': icedcappuccino_single_price,
    'icedcappuccino_double_price': icedcappuccino_double_price
  }
  return render(request, 'pricing.html', context)

def change_prices(request):
  if request.method == 'POST':
    just_java_price = request.POST.get('justjava_price')
    cafeaulait_single_price = request.POST.get('cafeaulait_single_price')
    cafeaulait_double_price = request.POST.get('cafeaulait_double_price')
    icedcappuccino_single_price = request.POST.get('icedcappuccino_single_price')
    icedcappuccino_double_price = request.POST.get('icedcappuccino_double_price')

    if just_java_price:
        prices.objects.filter(coffee='justjava').update(price=just_java_price)
    if cafeaulait_single_price:
        prices.objects.filter(coffee='cafeaulait_single').update(price=cafeaulait_single_price)
    if cafeaulait_double_price:
        prices.objects.filter(coffee='cafeaulait_double').update(price=cafeaulait_double_price)
    if icedcappuccino_single_price:
        prices.objects.filter(coffee='icedcappuccino_single').update(price=icedcappuccino_single_price)
    if icedcappuccino_double_price:
        prices.objects.filter(coffee='icedcappuccino_double').update(price=icedcappuccino_double_price)

    return redirect('pricing')
  else:
    return redirect('pricing')

def sale(request):
  top_seller = sales.objects.order_by('-quantity').first()
  context = {
      'top_seller': top_seller}
  return render(request, 'sales.html', context)

def generate(request):
  if request.method == 'POST':
    sales_prod = request.POST.get('sales_prod')
    sales_cat = request.POST.get('sales_cat')

  context = {}
  # Sum all the revenue together
  total_revenue = sales.objects.aggregate(total_revenue=Sum('revenue'))['total_revenue']
  context.update({'total_revenue': total_revenue})

  if sales_prod:
        # Group sales data by product and sum the quantities and revenues
        sales_data1 = sales.objects.values('product').annotate(
            total_quantity=Sum('quantity'),
            total_revenue=Sum('revenue')
        ).order_by('product')
        
        context.update({'sales_data1': sales_data1})
  if sales_cat:
        # Group sales data by category and sum the quantities and revenues
        sales_data2 = sales.objects.values('category').annotate(
            total_quantity=Sum('quantity'),
            total_revenue=Sum('revenue')
        ).order_by('category')
        
        context.update({'sales_data2': sales_data2})

  return render(request, 'generate.html', context)

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
