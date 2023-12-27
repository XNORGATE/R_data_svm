# Load necessary libraries
library("e1071",lib.loc= "C:/Users/user/AppData/Local/R/win-library/4.2")

# Load the trained SVM model
load("stress_svm_model.RData")  # Replace with the correct path to your trained model

# Receive input arguments from PHP script
args = commandArgs(trailingOnly = TRUE)

# Assuming the arguments are passed in the correct order
SleepQuality = as.numeric(args[1])  # First argument
HeadachesWeekly = as.numeric(args[2])  # Second argument
AcademicPerformance = as.numeric(args[3])  # Third argument
StudyLoad = as.numeric(args[4])  # Fourth argument
ExtracurricularActivities = as.numeric(args[5])  # Fifth argument
# SleepQuality = 1  # Example value
# HeadachesWeekly = 1  # Example value
# AcademicPerformance = 1  # Example value
# StudyLoad = 1  # Example value
# ExtracurricularActivities = 1
# Create a data frame with these values
# Make sure the column names match those used in training the model
test_data <- data.frame(
    `Kindly.Rate.your.Sleep.Quality...` = SleepQuality,
    `How.many.times.a.week.do.you.suffer.headaches....` = HeadachesWeekly,
    `How.would.you.rate.you.academic.performance.......` = AcademicPerformance,
    `how.would.you.rate.your.study.load.` = StudyLoad,
    `How.many.times.a.week.you.practice.extracurricular.activities....` = ExtracurricularActivities
)

# Predict using the SVM model
svm.pred <- predict(svm.model, test_data)

# Output the prediction
print(svm.pred)
