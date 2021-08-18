package internfinder.package;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    private PostsAdapter adapter;
    private ArrayList<PostsClass> postsClasses = new ArrayList<>();
    private ProgressDialog progressDialog;
    private RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        recyclerView = findViewById(R.id.recyclerviewposts);
        progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Fetching Data ...");
        progressDialog.show();
        adapter = new PostsAdapter(this);

        final String URL = "http://app.sallytraders.com/api/posts.php";
        RequestQueue queue = Volley.newRequestQueue(this);
        JsonObjectRequest req = new JsonObjectRequest(Request.Method.GET, URL, null,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                                    progressDialog.dismiss();
                            if (!response.getBoolean("response")){
                                Toast.makeText(MainActivity.this, response.getString("message"), Toast.LENGTH_LONG).show();
                            }else{
                                JSONArray posts = response.getJSONArray("posts");
                                for(int i = 0 ; i< posts.length();  i++){
                                    JSONObject post = posts.getJSONObject(i);
                                            /*PostsClass(int applicants, int applied, String[] documents, String startDate, String submitteddate,
                                             String endDate, String postID, String description, String ac_years, String intern_type
                                            , String certification, String location, String email, String phone, String company_name,
                                            String post_name, String company_logo)*/
                                    postsClasses.add(new PostsClass(post.getInt("applicants"), post.getInt("applied"),
                                            post.getJSONArray("documents"), post.getString("start"), post.getString("submitteddate")
                                            , post.getString("end"), post.getString("postID"), post.getString("description")
                                            , post.getString("ac_years"), post.getString("intern_type"), post.getString("certification")
                                            , post.getString("location"), post.getString("email"), post.getString("phone"), post.getString("company_name")
                                            , post.getString("post_name"), post.getString("company_logo")));
                                }
                                adapter.getPostClasses(postsClasses);
                                recyclerView.setLayoutManager(new LinearLayoutManager(MainActivity.this,RecyclerView.VERTICAL, false));
                                recyclerView.setAdapter(adapter);

                            }
                        } catch (JSONException e) {
                            progressDialog.dismiss();
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                progressDialog.dismiss();
                VolleyLog.e("Error: ", error.getMessage());
            }
        });

        queue.add(req);

    }



}