package internfinder.package;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.ArrayList;
import java.util.List;

public class PostsClass {
    private int applicants, applied;
    private JSONArray documents;
    private String startDate,submitteddate,endDate,postID,description,ac_years,intern_type,certification,location,email,phone,company_name,post_name,company_logo;

    public PostsClass(int applicants, int applied, JSONArray documents, String startDate, String submitteddate, String endDate, String postID, String description, String ac_years, String intern_type, String certification, String location, String email, String phone, String company_name, String post_name, String company_logo) {
        this.applicants = applicants;
        this.applied = applied;
        this.documents = documents;
        this.startDate = startDate;
        this.submitteddate = submitteddate;
        this.endDate = endDate;
        this.postID = postID;
        this.description = description;
        this.ac_years = ac_years;
        this.intern_type = intern_type;
        this.certification = certification;
        this.location = location;
        this.email = email;
        this.phone = phone;
        this.company_name = company_name;
        this.post_name = post_name;
        this.company_logo = company_logo;
    }



    public int getApplied() {
        return applied;
    }

    public void setApplied(int applied) {
        this.applied = applied;
    }

    public int getApplicants() {
        return applicants;
    }

    public String getSubmitteddate() {
        return submitteddate;
    }

    public void setSubmitteddate(String submitteddate) {
        this.submitteddate = submitteddate;
    }

    public void setApplicants(int applicants) {
        this.applicants = applicants;
    }

    public JSONArray getDocuments() {
        return documents;
    }

    public void setDocuments(JSONArray documents) {
        this.documents = documents;
    }

    public String getStartDate() {
        return startDate;
    }

    public void setStartDate(String startDate) {
        this.startDate = startDate;
    }

    public String getEndDate() {
        return endDate;
    }

    public void setEndDate(String endDate) {
        this.endDate = endDate;
    }

    public String getPostID() {
        return postID;
    }

    public void setPostID(String postID) {
        this.postID = postID;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getAc_years() {
        return ac_years;
    }

    public void setAc_years(String ac_years) {
        this.ac_years = ac_years;
    }

    public String getIntern_type() {
        return intern_type;
    }

    public void setIntern_type(String intern_type) {
        this.intern_type = intern_type;
    }

    public String getCertification() {
        return certification;
    }

    public void setCertification(String certification) {
        this.certification = certification;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public String getCompany_name() {
        return company_name;
    }

    public void setCompany_name(String company_name) {
        this.company_name = company_name;
    }

    public String getPost_name() {
        return post_name;
    }

    public void setPost_name(String post_name) {
        this.post_name = post_name;
    }

    public String getCompany_logo() {
        return company_logo;
    }

    public void setCompany_logo(String company_logo) {
        this.company_logo = company_logo;
    }

    public String implode() {
        String output = "";
        JSONArray arr = this.documents;
        List<String> list = new ArrayList<String>();
        for(int i = 0; i < arr.length(); i++){
            try {
                output += arr.getString(i)+", ";
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        return removeLastOccurance(output);
    }

    private String removeLastOccurance(String str) {
        if (str != null && str.length() > 0 && str.charAt(str.length() - 1) == 'x') {
            str = str.substring(0, str.length() - 1);
            str = str.substring(0, str.length() - 1);
        }
        return str;
    }
}
