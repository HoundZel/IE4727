from django.db import models

class prices(models.Model):
    coffee = models.CharField(max_length=50)
    price = models.DecimalField(max_digits=5, decimal_places=2)

    def __str__(self):
        return f"{self.coffee} - {self.price}"

class sales(models.Model):
    coffee = models.CharField(max_length=50)
    product = models.CharField(max_length=50)
    category = models.CharField(max_length=50)
    quantity = models.IntegerField()
    revenue = models.DecimalField(max_digits=10, decimal_places=2)

    def __str__(self):
        return f"{self.coffee} - {self.product} - {self.category} - {self.quantity} - {self.revenue}"