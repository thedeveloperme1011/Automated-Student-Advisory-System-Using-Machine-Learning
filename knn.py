import pandas as pd

dataset = pd.read_csv("C:/Users/Vignesh S/Downloads/Final_dept_dataset - Sheet1.csv")
X = dataset.iloc[:, 1:8].values
y = dataset.iloc[:, 8].values  

ya = [] 

print("\nEnter the marks in each skill\n")
  
for i in range(1):        
    a =[] 
    for j in range(7):       
         a.append(int(input())) 
    ya.append(a) 
  
from sklearn.neighbors import KNeighborsClassifier
classifier = KNeighborsClassifier(n_neighbors = 3, metric = 'minkowski', p = 2)
classifier.fit(X,y)
y_pred = classifier.predict(ya)
#print(y_pred)
if y_pred==0:
    print("You are strong in Analytical and Hardware skills which are to be considered as core skills and also you have good knowledge in Sub skills which are related to Mech Dept, And so you can opt for Mechanical Engineering")
elif y_pred==1:
    print("You are strong in Analytical and Problem solving skills, You can opt for Electronics and Communication Engineering")
elif y_pred==2:
    print("You are strong in Analytical and Hardware skills which are to be considered as core skills and also you have good knowledge in Sub skills which are related to EEE Dept, And so you can opt for Electrical and Electronics Engineering")
elif y_pred==3:
    print("You are strong in Logical and Programming skills which are to be considered as core skills and also you have good knowledge in Sub skills which are related to CSE Dept, And so you can opt for Computer Science Engineering")
elif y_pred==4:
    print("You are lagging in core skills. Try to improve it.")
elif y_pred==5:
    print("You are eligible for all departments.")
else:
    print("default")
