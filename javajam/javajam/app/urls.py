from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('jobs/', views.jobs, name='jobs'),
    path('menu/', views.menu, name='menu'),
    path('music/', views.music, name='music'),
    path('show_form/', views.show_form, name='show_form'),
    path('pricing', views.pricing, name='pricing'),
    path('sales', views.sales, name="sales"),
]